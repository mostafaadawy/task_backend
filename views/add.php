<!-- views/add.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="/task_backend/public/js/validation.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Add Employee</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?action=create" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="text" id="salary" name="salary" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Add Employee</button>
        </form>
        <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="btn btn-secondary mt-3">Back to Employee List</a>
    </div>
</body>
</html>
