/*form validation*/
function checkPassword() {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm_password").value;

    if (password !== confirmPassword) {
        alert("Password do not match");
        return false;  // Prevents submission
    }
}

function enableButton() {
    document.getElementById("submit").disabled = !document.getElementById("checkBox").checked;
}

 // Event listener for 'Forgot Password?' link
document.getElementById('forgotPasswordLink').addEventListener("click", function(event) {
event.preventDefault();

// Alert to update password
alert("Please raise a ticket to reset your password!");
});