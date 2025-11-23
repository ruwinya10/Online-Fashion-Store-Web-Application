document.getElementById("profile_form").addEventListener("submit", function (e) {
  const newPassword = document.getElementById("new-password").value;
  const confirmPassword = document.getElementById("confirm-password").value;

  // Check if the new password and confirm password match
  if (newPassword !== confirmPassword) {
      alert("Passwords do not match. Please try again.");
      e.preventDefault(); // Prevent the form from submitting
  }
});

// Store the initial state of the form fields when the page loads
let initialFormState = {};

// Wait for the DOM to load before capturing the initial state
window.onload = function () {
    // Capture the initial values of the form fields
    initialFormState = {
        fname: document.getElementById('fname').value,
        lname: document.getElementById('lname').value,
        username: document.getElementById('username').value,
        email: document.getElementById('email').value,
    };
};

// Add event listener for the "Cancel" button
document.querySelector(".cancel_btn").addEventListener("click", function () {
    // Confirm the cancel action with the user
    if (confirm('Are you sure you want to cancel your changes?')) {
        // Reset the form fields to their initial values
        document.getElementById('fname').value = initialFormState.fname;
        document.getElementById('lname').value = initialFormState.lname;
        document.getElementById('username').value = initialFormState.username;
        document.getElementById('email').value = initialFormState.email;
    }
});
