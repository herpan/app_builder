<?php
class Database {

	function create_database($data)
	{
		$mysqli = new mysqli($data['hostname'],$data['username'],$data['password'],'');
		if(mysqli_connect_errno())
			return false;
		$mysqli->query("CREATE DATABASE IF NOT EXISTS ".$data['database']);
		$mysqli->close();
		return true;
	}

	function create_tables($data)
	{
		$mysqli = new mysqli($data['hostname'],$data['username'],$data['password'],$data['database']);
		if(mysqli_connect_errno())
			return false;
		
		

		$lines = file('assets/sqlcommand.sql');
		
		// Loop through each line
		
		$start_point=0;
		$temp_query="";
		$tmp_line="";
		$trigger=array();
		foreach ($lines as $line) {	
			if($start_point==1){
				$temp_query.=$line;
			}		
			elseif($start_point==2){
				$temp_query=$temp_query= str_replace('$$',"",$temp_query);
				$temp_query=$temp_query= str_replace('DELIMITER',"",$temp_query);
				$trigger[]=$temp_query;
				$start_point=0;
				$temp_query="";
			}
			else{
				$tmp_line.=$line;
			}
			if (strpos($line,"DELIMITER")>-1){
				$start_point++;	
			}
		}

		$tmp_line= str_replace('DELIMITER $$',"",$tmp_line);
		$tmp_line= str_replace('DELIMITER ;',"",$tmp_line);
		$mysqli->multi_query($tmp_line);
		$mysqli->close();

		// Create trigger
		$driver = 'mysql';
		$host = $data['hostname'];
		$port = 3306;
		$socket = ''; // Optional
		$username = $data['username'];
		$password = $data['password'];
		$database = $data['database'];
		$options = [
			\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
			\PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
			\PDO::ATTR_EMULATE_PREPARES   => true,
			\PDO::ATTR_CURSOR             => \PDO::CURSOR_FWDONLY,
		];
		try {
			// Get the Connexion's DSN
			if (empty($socket)) {
				$dsn = $driver . ':host=' . $host . ';port=' . $port . ';dbname=' . $database . ';charset=utf8';
			} else {
				$dsn = $driver . ':unix_socket=' . $socket . ';dbname=' . $database . ';charset=utf8';
			}
			// Connect to the Database Server
			$pdo = new \PDO($dsn, $username, $password, $options);
			
		} catch (\PDOException $e) {
			die("Can't connect to the database server. ERROR: " . $e->getMessage());
		} catch (\Exception $e) {
			die("The database connection failed. ERROR: " . $e->getMessage());
		}	

		foreach(@$trigger as $trg){
			try {
				// Perform the Query
				$pdo->exec($trg);				
			} catch (\PDOException $e) {
				echo "<br><pre>Error performing Query: '<strong>" . $tmpLine . "</strong>': " . $e->getMessage() . "</pre>\n";
				$errorDetect = true;
			}			
		}	
	
		return true;
	}
}
