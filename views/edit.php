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
        <form id="editForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?action=update&id=<?php echo $employee['id']?>" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php 
                 if(isset($employee['name']))
                 {
                    echo htmlspecialchars($employee['name']);
                }else{
                    echo "";
                   }
                ?>" >
                <div id="nameError" class="text-danger"></div>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php 
                 if(isset($employee['email']))
                 {
                    echo htmlspecialchars($employee['email']);
                }else{
                    echo "";
                   }
                ?>" />
                <div id="emailError" class="text-danger"></div>
            </div>

            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="text" id="salary" name="salary" class="form-control" value="<?php 
                 if(isset($employee['salary']))
                 {
                    echo htmlspecialchars($employee['salary']);
                }else{
                    echo "";
                   }
                ?>" >
                <div id="salaryError" class="text-danger"></div>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                
                <input type="text" id="address" name="address" class="form-control" value="<?php 
                 if(isset($employee['address']))
                 {
                    echo htmlspecialchars($employee['address']);
                }else{
                    echo "";
                   }
                ?>" />
                <div id="addressError" class="text-danger"></div>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Employee</button>
        </form>
        <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="btn btn-secondary mt-3">Back to Employee List</a>
    </div>
</body>
</html>
