<?php

class Database
{
	private $connection;

	private static $instance;

	private function __construct()
	{
	    /*
		$this->connection = new mysqli(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD, DB_DATABASE);
        */
        $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
		if ( $this->connection->connect_errno ) {
			throw new Exception('Could not connect to DB. Error: ' . $this->connection->connect_error);
		}
		$this->connection->set_charset('utf8');
	}

	public static function getInstance()
	{
		if ( empty(self::$instance) ) {
			self::$instance = new Database();
		}
		return self::$instance;
	}

	public function query($sql)
	{
		if ( !$this->connection ) {
			return false;
		}

		$result = $this->connection->query($sql);

		if ( $this->connection->error ) {
			throw new Exception($this->connection->error);
		}

		if ( is_bool($result) ) {
			return $result;
		}

		$data = array();
		while ( $row = $result->fetch_assoc() ) {
			$data[] = $row;
		}

		return $data;
	}

	public function escape($str)
	{
		return $this->connection->real_escape_string($str);
	}

	public function escapeArray($data)
	{
		foreach ($data as $key => $value) {
			$data[$key] = $this->escape($value);
		}

		return $data;
	}

	public function getInsertedId()
	{
		return $this->connection->insert_id;
	}
}
