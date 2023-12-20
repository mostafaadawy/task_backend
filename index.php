<?php
define('BASE_PATH', __DIR__);

require_once(BASE_PATH . '/config/database.php');
require_once(BASE_PATH . '/controllers/EmployeeController.php');

$controller = new EmployeeController();
$controller->index();
?>
