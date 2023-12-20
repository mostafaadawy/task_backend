<!-- views/view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">View Employee</h1>
        <dl class="row">
            <dt class="col-sm-3">Name:</dt>
            <dd class="col-sm-9"><?php echo $employee['name']; ?></dd>

            <dt class="col-sm-3">Email:</dt>
            <dd class="col-sm-9"><?php echo $employee['email']; ?></dd>

            <dt class="col-sm-3">Salary:</dt>
            <dd class="col-sm-9"><?php echo $employee['salary']; ?></dd>

            <dt class="col-sm-3">Address:</dt>
            <dd class="col-sm-9"><?php echo $employee['address']; ?></dd>
        </dl>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-secondary mt-3">Back to Employee List</a>
    </div>
</body>
</html>
