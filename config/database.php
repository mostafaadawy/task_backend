<?php
// Database configuration
define('DB_HOST', 'localhost:3308');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'task_backend');


try {
    // Connect to the database
    $pdo = new PDO('"'.'mysql:host='.DB_HOST.';dbname'.DB_NAME.'"', DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the table exists
    $stmt = $pdo->prepare("SHOW TABLES LIKE 'employees'");
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        // Table does not exist, create it
        $createTableSQL = "
            CREATE TABLE employees (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                salary DECIMAL(10, 2) NOT NULL,
                address VARCHAR(255),
                is_deleted TINYINT(1) DEFAULT 0
            )
        ";

        $pdo->exec($createTableSQL);

        echo 'Table created successfully!';
    } else {
        echo 'Table already exists.';
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
