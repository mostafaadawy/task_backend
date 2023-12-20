<!-- views/view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employee</title>
    <link rel="stylesheet" href="/task_backend/public/css/style.css">
</head>
<body>
    <h1>View Employee</h1>
    <dl>
        <dt>Name:</dt>
        <dd><?php echo $employee['name']; ?></dd>
        <dt>Email:</dt>
        <dd><?php echo $employee['email']; ?></dd>
        <dt>Salary:</dt>
        <dd><?php echo $employee['salary']; ?></dd>
        <dt>Address:</dt>
        <dd><?php echo $employee['address']; ?></dd>
    </dl>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Back to Employee List</a>
</body>
</html>
