<?php
// require_once('../models/EmployeeModel.php');
require_once(BASE_PATH .'/models/EmployeeModel.php'); //abslute path

class EmployeeController {
    private $model;

    public function __construct() {
        $this->model = new EmployeeModel();
    }

    public function index() {
        $employees = $this->model->getAllEmployees();
        require('../views/index.php');
    }

    public function view($id) {
        $employee = $this->model->getEmployeeById($id);
        require('../views/view.php');
    }

    public function edit($id) {
        $employee = $this->model->getEmployeeById($id);
        require('../views/edit.php');
    }

    public function update($id, $name, $email, $salary, $address) {
        // Add validation here (e.g., check if fields are not empty)

        // Sanitize inputs
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $salary = filter_var($salary, FILTER_SANITIZE_NUMBER_FLOAT);
        $address = filter_var($address, FILTER_SANITIZE_STRING);

        // Update the employee
        $this->model->updateEmployee($id, $name, $email, $salary, $address);

        // Redirect to the index page
        header('Location: index.php');
    }

    public function delete($id) {
        // Soft delete the employee
        $this->model->softDeleteEmployee($id);

        // Redirect to the index page
        header('Location: index.php');
    }
}
?>
