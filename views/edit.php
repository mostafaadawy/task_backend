<!-- views/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="<?php echo BASE_URL.'/public/css/bootstrapOfline.css'; ?>">
    <script src="<?php echo BASE_URL.'/public/js/validation.js';?>"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Edit Employee</h1>
        <?php if(isset($status)){echo "error";}?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?action=update" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($employee['id']); ?>">

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($employee['name']); ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($employee['email']); ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="text" id="salary" name="salary" value="<?php echo htmlspecialchars($employee['salary']); ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($employee['address']); ?>" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Employee</button>
        </form>
        <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="btn btn-secondary mt-3">Back to Employee List</a>
    </div>
</body>
</html>
