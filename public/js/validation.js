// public/js/validation.js
function validateForm() {
  // Your validation logic here
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var salary = document.getElementById("salary").value;
  var address = document.getElementById("address").value;

  // Reset previous error messages
  resetErrors();

  var isValid = true;

  // Validate Name
  if (!name.match(/^[a-zA-Z]+$/)) {
    document.getElementById("nameError").innerText =
      "Name should contain only alphabetic characters.";
    isValid = false;
  }

  // Validate Email
  // You may use a more complex email validation regex
  if (!email.includes("@")) {
    document.getElementById("emailError").innerText = "Invalid email format.";
    isValid = false;
  }

  // Validate Salary
  if (!salary.match(/^\d+(\.\d+)?$/)) {
    document.getElementById("salaryError").innerText =
      "Salary should contain only numbers.";
    isValid = false;
  }

  // Validate Address
  if (address !== "" && !address.match(/^[a-zA-Z0-9 ]+$/)) {
    document.getElementById("addressError").innerText =
      "Address should contain only alphabets, numbers, and spaces.";
    isValid = false;
  }

  return isValid;
}

function resetErrors() {
  document.getElementById("nameError").innerText = "";
  document.getElementById("emailError").innerText = "";
  document.getElementById("salaryError").innerText = "";
  document.getElementById("addressError").innerText = "";
}

// script.js

document.addEventListener("DOMContentLoaded", function () {
  // Select all elements with the class "delete-btn"
  var deleteButtons = document.querySelectorAll(".delete-btn");
  const BASE_URL_IN = document.getElementById("url");
  const BASE_URL = BASE_URL_IN?.value;
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
          body: "id=" + employeeId,
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
