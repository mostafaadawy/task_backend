<!-- views/add.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="/task_backend/public/css/style.css">
    <script src="/task_backend/public/js/validation.js"></script>
</head>
<body>
    <h1>Add Employee</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?action=create" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="salary">Salary:</label>
        <input type="text" id="salary" name="salary" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address">

        <button type="submit">Add Employee</button>
    </form>
    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">Back to Employee List</a>
</body>
</html>
