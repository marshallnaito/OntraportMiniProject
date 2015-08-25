<?php

class Database {
	
	private static $db;
	private $connection;

	private function __construct() {
		$config = parse_ini_file('user.credentials.ini');
		$this->connection = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
	}

	private function __destruct() {
		$this->connection->close();
	}

	public static function getConnection() {
		if ($db==null) {
			$db = new DataBase();
		}
		return $db->connection;
	}
}