<?php
class EmployeeModel {
    private $db;

    public function __construct() {
        // Connect to the database
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    public function getAllEmployees() {
        $stmt = $this->db->prepare("SELECT * FROM employees WHERE is_deleted = 0");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEmployeeById($id) {
        $stmt = $this->db->prepare("SELECT * FROM employees WHERE id = :id AND is_deleted = 0");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addEmployee($name, $email, $salary, $address) {
        $stmt = $this->db->prepare("INSERT INTO employees (name, email, salary, address) VALUES (:name, :email, :salary, :address)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':address', $address);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateEmployee($id, $name, $email, $salary, $address) {
        $stmt = $this->db->prepare("UPDATE employees SET name = :name, email = :email, salary = :salary, address = :address WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':address', $address);
        return $stmt->execute();
    }

    public function softDeleteEmployee($id) {
        $stmt = $this->db->prepare("UPDATE employees SET is_deleted = 1 WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
