<?php
require_once(BASE_PATH . '/models/EmployeeModel.php');

class EmployeeController {
    private $model;

    public function __construct() {
        $this->model = new EmployeeModel();
    }

    public function index() {
        $employees = $this->model->getAllEmployees();
        require(BASE_PATH . '/views/index.php');
    }

    public function view() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if ($id) {
            $employee = $this->model->getEmployeeById($id);
            require(BASE_PATH . '/views/view.php');
        } else {
            header("Location: /task_backend/index.php");
            exit();
        }
    }

    public function add() {
        require(BASE_PATH . '/views/add.php');
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $this->sanitizeInput($_POST['name']);
            $email = $this->sanitizeInput($_POST['email']);
            $salary = $this->sanitizeInput($_POST['salary']);
            $address = $this->sanitizeInput($_POST['address']);

            if ($this->isValidEmail($email) && $this->isValidSalary($salary)) {
                $employeeId = $this->model->addEmployee($name, $email, $salary, $address);

                header("Location: /task_backend/index.php");
                exit();
            } else {
                // Handle validation failure (e.g., show an error message)
            }
        } else {
            header("Location: /task_backend/index.php");
            exit();
        }
    }

    public function edit() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if ($id) {
            $employee = $this->model->getEmployeeById($id);
            require(BASE_PATH . '/views/edit.php');
        } else {
            header("Location: /task_backend/index.php");
            exit();
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $this->sanitizeInput($_POST['id']);
            $name = $this->sanitizeInput($_POST['name']);
            $email = $this->sanitizeInput($_POST['email']);
            $salary = $this->sanitizeInput($_POST['salary']);
            $address = $this->sanitizeInput($_POST['address']);

            if ($this->isValidEmail($email) && $this->isValidSalary($salary)) {
                $success = $this->model->updateEmployee($id, $name, $email, $salary, $address);

                if ($success) {
                    header("Location: /task_backend/index.php");
                    exit();
                } else {
                    // Handle update failure (e.g., show an error message)
                }
            } else {
                // Handle validation failure (e.g., show an error message)
            }
        } else {
            header("Location: /task_backend/index.php");
            exit();
        }
    }

    public function delete() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        $success = $this->model->softDeleteEmployee($id);

        if ($success) {
            header("Location: /task_backend/index.php");
            exit();
        } else {
            // Handle deletion failure (e.g., show an error message)
        }
    }

    private function sanitizeInput($input) {
        return htmlspecialchars(trim($input));
    }

    private function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    private function isValidSalary($salary) {
        return is_numeric($salary) && $salary >= 0;
    }
}
?>
