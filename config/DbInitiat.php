<?php
class DbInitiat {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function CreateTable() {
        try {
            // Check if the table exists
            $result = $this->mysqli->query("SHOW TABLES LIKE 'employees'");

            if ($result->num_rows == 0) {
                // Table does not exist, create it
                $createTableSQL = "
                CREATE TABLE employees (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(255) NOT NULL,
                    email VARCHAR(255) NOT NULL,
                    salary DECIMAL(10, 2) NOT NULL,
                    address VARCHAR(255),
                    deleted TINYINT(1) DEFAULT 0
                )";

                $this->mysqli->query($createTableSQL);

                // echo 'Table created successfully!';
            } else {
                // echo 'Table already exists.';
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>
