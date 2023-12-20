<?php
require_once(BASE_PATH . '/config/DbInitiat.php');

class EmployeeModel {
    private $db;
    private $initiat;

    public function __construct() {
        // Connect to the database
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        // Check connection
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }

        $this->initiat = new DbInitiat($this->db);
        $this->initiat->CreateTable();
    }

    public function getAllEmployees() {
        $result = $this->db->query("SELECT * FROM employees WHERE is_deleted = 0");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEmployeeById($id) {
        $stmt = $this->db->prepare("SELECT * FROM employees WHERE id = ? AND is_deleted = 0");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function addEmployee($name, $email, $salary, $address) {
        $stmt = $this->db->prepare("INSERT INTO employees (name, email, salary, address) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssds', $name, $email, $salary, $address);
        $stmt->execute();
        return $this->db->insert_id;
    }

    public function updateEmployee($id, $name, $email, $salary, $address) {
        $stmt = $this->db->prepare("UPDATE employees SET name = ?, email = ?, salary = ?, address = ? WHERE id = ?");
        $stmt->bind_param('ssdsi', $name, $email, $salary, $address, $id);
        return $stmt->execute();
    }

    public function softDeleteEmployee($id) {
        $stmt = $this->db->prepare("UPDATE employees SET is_deleted = 1 WHERE id = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
?>
