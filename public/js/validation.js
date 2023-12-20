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
// script.js

document.addEventListener("DOMContentLoaded", function () {
  // Select all elements with the class "delete-btn"
  var deleteButtons = document.querySelectorAll(".delete-btn");

  // Add click event listener to each delete button
  deleteButtons.forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault(); // Prevent the default link behavior

      // Get the employee ID from the data-id attribute
      var employeeId = button.getAttribute("data-id");

      // Debugging: Log the employee ID to the console
      console.log("Employee ID to delete:", employeeId);

      // Debugging: Alert the employee ID
      alert("Employee ID to delete: " + employeeId);

      // Debugging: Log a message to the console
      console.log("Deletion triggered but not redirected");

      // Debugging: Confirm deletion
      var confirmDelete = confirm(
        "Are you sure you want to delete this employee?"
      );
      console.log("Deletion confirmed:", confirmDelete);

      // Debugging: Log a message to the console
      console.log("Deletion complete");
    });
  });
});
