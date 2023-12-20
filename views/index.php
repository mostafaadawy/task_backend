<!-- views/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <link rel="stylesheet" href="/task_backend/public/css/style.css">
    <script src="/task_backend/public/js/validation.js"></script>
</head>
<body>
    <h1>Employee List</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Salary</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?php echo $employee['name']; ?></td>
                    <td><?php echo $employee['email']; ?></td>
                    <td><?php echo $employee['salary']; ?></td>
                    <td>
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=view&id=<?php echo $employee['id']; ?>">View</a>
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=edit&id=<?php echo $employee['id']; ?>">Edit</a>
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=delete&id=<?php echo $employee['id']; ?>" onclick="return confirmDelete()">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=add">Add Employee</a>
</body>
</html>
