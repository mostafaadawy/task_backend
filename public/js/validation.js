// public/js/validation.js

function validateForm() {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var salary = document.getElementById("salary").value;
  var address = document.getElementById("address").value;

  // Regular expressions for validation
  var nameRegex = /^[a-zA-Z\s]+$/;
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var salaryRegex = /^\d+(\.\d{1,2})?$/;
  var addressRegex = /^[a-zA-Z\s]+$/;

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

  if (!addressRegex.test(address)) {
    alert("Invalid Address format");
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

      // Debugging: Confirm deletion
      var confirmDelete = confirm(
        "Are you sure you want to delete this employee?"
      );

      if (confirmDelete) {
        // Make a POST request to the delete route
        fetch(`${BASE_URL}/index.php?action=delete&id=${employeeId}`, {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: "employeeId=" + employeeId,
        })
          .catch((error) => console.error("Error:", error))
          .finally(() => {
            // Reload the page after the POST request is complete
            location.reload();
          });
      } else {
        // Debugging: Log a message to the console if deletion is canceled
        console.log("Deletion canceled");
      }
    });
  });
});
