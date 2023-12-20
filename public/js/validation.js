// public/js/validation.js

function validateForm() {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var salary = document.getElementById("salary").value;

  // Regular expressions for validation
  var nameRegex = /^[a-zA-Z\s]+$/;
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var salaryRegex = /^\d+(\.\d{1,2})?$/;

  // Perform your validation logic here
  if (!nameRegex.test(name)) {
    alert("Invalid name format");
    return false;
  }

  if (!emailRegex.test(email)) {
    alert("Invalid email format");
    return false;
  }

  if (!salaryRegex.test(salary)) {
    alert("Invalid salary format");
    return false;
  }

  // Add more validation rules as needed

  return true;
}

function confirmDelete() {
  return confirm("Are you sure you want to delete this employee?");
}
