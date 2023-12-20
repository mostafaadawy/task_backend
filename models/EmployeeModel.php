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
        // Sanitize input
        $name = $this->sanitizeInput($name);
        $email = $this->sanitizeInput($email);
        $salary = $this->sanitizeInput($salary);
        $address = $this->sanitizeInput($address);

        // Validate email uniqueness
        if ($this->isEmailUnique($email)) {
            $stmt = $this->db->prepare("INSERT INTO employees (name, email, salary, address) VALUES (?, ?, ?, ?)");
            $stmt->bind_param('ssds', $name, $email, $salary, $address);
            $stmt->execute();
            return $this->db->insert_id;
        } else {
            return false; // Email is not unique
        }
    }

    public function updateEmployee($id, $name, $email, $salary, $address) {
        // Sanitize input
        $name = $this->sanitizeInput($name);
        $email = $this->sanitizeInput($email);
        $salary = $this->sanitizeInput($salary);
        $address = $this->sanitizeInput($address);

        // Validate email uniqueness (excluding the current employee)
        if ($this->isEmailUnique($email, $id)) {
            $stmt = $this->db->prepare("UPDATE employees SET name = ?, email = ?, salary = ?, address = ? WHERE id = ?");
            $stmt->bind_param('ssdsi', $name, $email, $salary, $address, $id);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        } else {
            return false; // Email is not unique
        }
    }

    public function softDeleteEmployee($id) {
        $stmt = $this->db->prepare("UPDATE employees SET is_deleted = 1 WHERE id = ?");
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Check if the email is unique
 
    private function isEmailUnique($email, $excludeId = null) {
        $query = "SELECT COUNT(*) FROM employees WHERE email = ?";
        if ($excludeId !== null) {
            $query .= " AND id != ?";
        }
        $stmt = $this->db->prepare($query);

        if ($excludeId !== null) {
            $stmt->bind_param('si', $email, $excludeId);
        } else {
            $stmt->bind_param('s', $email);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->fetch_row()[0];
        return $count == 0;
    }
    // Sanitize input
    private function sanitizeInput($input) {
        return $this->db->real_escape_string($input);
    }
}
?>
