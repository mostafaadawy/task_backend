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
        // Retrieve the id parameter from the URL
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if ($id) {
            $employee = $this->model->getEmployeeById($id);
            require(BASE_PATH . '/views/view.php');
        } else {
            // Handle invalid or missing id parameter (e.g., redirect to index)
            header("Location: /task_backend/index.php");
            exit();
        }
    }

    public function add() {
        require(BASE_PATH . '/views/add.php');
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission for adding a new employee
            $name = $_POST['name'];
            $email = $_POST['email'];
            $salary = $_POST['salary'];
            $address = $_POST['address'];

            $employeeId = $this->model->addEmployee($name, $email, $salary, $address);

            // Redirect to view the newly created employee
            header("Location: /task_backend/index.php?action=view&id={$employeeId}");
            exit();
        } else {
            // Invalid request method, redirect to index
            header("Location: /task_backend/index.php");
            exit();
        }
    }

    public function edit() {
        // Retrieve the id parameter from the URL
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if ($id) {
            $employee = $this->model->getEmployeeById($id);
            require(BASE_PATH . '/views/edit.php');
        } else {
            // Handle invalid or missing id parameter (e.g., redirect to index)
            header("Location: /task_backend/index.php");
            exit();
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission for updating an employee
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $salary = $_POST['salary'];
            $address = $_POST['address'];

            $success = $this->model->updateEmployee($id, $name, $email, $salary, $address);

            if ($success) {
                // Redirect to view the updated employee
                header("Location: /task_backend/index.php?action=view&id={$id}");
                exit();
            } else {
                // Handle update failure (e.g., show an error message)
            }
        } else {
            // Invalid request method, redirect to index
            header("Location: /task_backend/index.php");
            exit();
        }
    }

    public function delete() {
        // Retrieve the id parameter from the URL
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        // Implement the logic to handle the deletion of the employee
        // Call $this->model->softDeleteEmployee(...) with the $id
        // Redirect to the index page or show a success message
        $success = $this->model->softDeleteEmployee($id);

        if ($success) {
            // Redirect to the index page after successful deletion
            header("Location: /task_backend/index.php");
            exit();
        } else {
            // Handle deletion failure (e.g., show an error message)
        }
    }
}
?>
