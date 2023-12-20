<!-- views/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="/task_backend/public/js/validation.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Employee List</h1>
        <table class="table">
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
                            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=view&id=<?php echo $employee['id']; ?>" class="btn btn-info">View</a>
                            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=edit&id=<?php echo $employee['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=delete&id=<?php echo $employee['id']; ?>" onclick="return confirmDelete()" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=add" class="btn btn-primary">Add Employee</a>
    </div>
</body>
</html>
