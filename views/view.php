<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>View Employee</title>
</head>
<body>
    <h1>View Employee</h1>
    <p>Name: <?= $employee['name'] ?></p>
    <p>Email: <?= $employee['email'] ?></p>
    <p>Salary: <?= $employee['salary'] ?></p>
    <p>Address: <?= $employee['address'] ?></p>
    <a href="index.php">Back to List</a>
</body>
</html>
