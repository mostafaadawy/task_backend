<?php
// Define routes with controller, action, and HTTP method
$routes = array(
    'GET:index'  => 'EmployeeController@index',
    'GET:view'   => 'EmployeeController@view',
    'GET:add'    => 'EmployeeController@add',
    'POST:create' => 'EmployeeController@create',
    'GET:edit'   => 'EmployeeController@edit',
    'POST:update' => 'EmployeeController@update',
    'POST:delete' => 'EmployeeController@delete',
);

// Parse the current request method and action from the URL
$requestMethod = $_SERVER['REQUEST_METHOD'];
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Build the route key based on the request method and action
$routeKey = "{$requestMethod}:{$action}";

// Check if the route exists
if (array_key_exists($routeKey, $routes)) {
    // Split the controller and action from the route definition
    list($controllerName, $methodName) = explode('@', $routes[$routeKey]);

    // Include the necessary files
    require_once(BASE_PATH . '/controllers/' . $controllerName . '.php');
    require_once(BASE_PATH . '/models/EmployeeModel.php');

    // Instantiate the controller
    $controller = new $controllerName();

    // Call the specified method
    $controller->$methodName();
} else {
    // Handle invalid route (e.g., redirect to a default page)
    header("Location: /task_backend/index.php");
    exit();
}
?>
