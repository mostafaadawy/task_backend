<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $employee['id'] ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $employee['name'] ?>" required>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= $employee['email'] ?>" required>
        <label for="salary">Salary:</label>
        <input type="number" name="salary" value="<?= $employee['salary'] ?>" required>
        <label for="address">Address:</label>
        <input type="text" name="address" value="<?= $employee['address'] ?>">
        <button type="submit">Update</button>
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>
