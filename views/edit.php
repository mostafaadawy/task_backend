<!-- views/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="/task_backend/public/css/style.css">
</head>
<body>
    <h1>Edit Employee</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?action=update" method="post">
        <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $employee['name']; ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $employee['email']; ?>" required>

        <label for="salary">Salary:</label>
        <input type="text" id="salary" name="salary" value="<?php echo $employee['salary']; ?>" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $employee['address']; ?>">

        <button type="submit">Update Employee</button>
    </form>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Back to Employee List</a>
</body>
</html>
