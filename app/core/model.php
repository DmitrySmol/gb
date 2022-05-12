<?php

class Model
{
	protected $db;

	protected $table = '';

	public function __construct()
	{
		$this->db = Database::getInstance();
	}

	public function create($data)
	{
		$data = $this->db->escapeArray($data);

		$sql = "INSERT INTO " . $this->table;
		
		$fields = array_map(function($field) {
			return '`' . $field . '`';
		}, array_keys($data));
		$sql .= " (" . implode(', ', $fields) . ")";

		$values = array_map(function($value) {
			return "'" . $value . "'";
		}, array_values($data));
		$sql .= " VALUES (" . implode(', ', $values) . ")";
		
		$result = $this->db->query($sql);

		if ( $result ) {
			$result = $this->db->getInsertedId();
		}
		return $result;
	}

	public function read($id = null)
	{
		$sql = "SELECT * FROM " . $this->table;
		if ( $id ) {
			$sql .= " WHERE `id` = " . $id;
		}

		$result = $this->db->query($sql);

		return $id ? $result[0] : $result;
	}

	public function update($data, $id)
	{
		$data = $this->db->escapeArray($data);

		$sql = "UPDATE " . $this->table . " SET ";
		foreach ($data as $key => $value) {
			$sql .= " `{$key}` = '{$value}', ";
		}
		$sql = mb_substr($sql, 0, mb_strlen($sql)-2);
		$sql .= " WHERE `id` = " . $id;
		
		return $this->db->query($sql);
	}

	public function delete($id)
	{
		$sql = "DELETE FROM " . $this->table . " WHERE id = {$id}";
		return $this->db->query($sql);
	}
}