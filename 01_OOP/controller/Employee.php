<?php
/**
 * 
 */
class Employee
{
	private $conn;
	function __construct($dbConn) {
		$this->conn = $dbConn;
	}
	public function listAll() {
		$stmt = $this->conn->query("SELECT * FROM employeetable");
		return $stmt->fetchAll();
	}
	public function add($name, $age, $position) {
		$stmt = $this->conn->prepare("INSERT INTO employeetable (name, age, position) VALUES (?, ?, ?)");
		return $stmt->execute([$name, $age, $position]);
	}
	public function edit($name, $age, $position, $id) {
		$stmt = $this->conn->prepare("UPDATE employeetable SET name = ?, age = ?, position = ? WHERE  id = ?");
		return $stmt->execute([$name, $age, $position, $id]);
	}
	public function delete($id) {
		$stmt = $this->conn->prepare("DELETE FROM employeetable WHERE id = ?");
		return $stmt->execute([$id]);
	}
}