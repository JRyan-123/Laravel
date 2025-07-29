<?php
require_once 'model/Database.php';
require_once 'controller/Employee.php';

$db =  new Database();
$conn = $db->connect();

$employee = new Employee($conn);

$action = $_GET['action'] ?? '';

switch ($action) {
	case 'list':
		echo json_encode($employee->listAll());
		break;
	case 'add':
		echo json_encode($employee->add($name, $age, $position));
		break;
	case 'delete':
		$id = $_GET['id'] ?? '';
		echo json_encode($employee->delete($id));
		break;
	default:
		break;
}
