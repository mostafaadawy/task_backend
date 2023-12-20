// Add your JavaScript validations here

function validateForm() {
    var name = document.forms["employeeForm"]["name"].value;
    var email = document.forms["employeeForm"]["email"].value;
    var salary = document.forms["employeeForm"]["salary"].value;

    if (name === "") {
        alert("Name must be filled out");
        return false;
    }

    if (email === "") {
        alert("Email must be filled out");
        return false;
    }

    if (salary === "" || isNaN(salary)) {
        alert("Salary must be a number");
        return false;
    }

    return true;
}
