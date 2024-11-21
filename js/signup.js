// Toggle between Sign Up and Login forms
function showLogin() {
    document.getElementById("signUpContainer").style.display = "none";
    document.getElementById("loginContainer").style.display = "block";
}

function showSignUp() {
    document.getElementById("signUpContainer").style.display = "block";
    document.getElementById("loginContainer").style.display = "none";
}

// Validation for Sign Up Form
document.getElementById("signUpForm").addEventListener("submit", function(event) {
    let isValid = true;

    // Username validation
    const username = document.getElementById("signUpUsername").value;
    if (username.length < 3 || username.length > 20) {
        isValid = false;
        document.getElementById("usernameError").textContent = "Username must be between 3 and 20 characters.";
    } else {
        document.getElementById("usernameError").textContent = "";
    }

    // Email validation
    const email = document.getElementById("signUpEmail").value;
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!email.match(emailPattern)) {
        isValid = false;
        document.getElementById("emailError").textContent = "Please enter a valid email.";
    } else {
        document.getElementById("emailError").textContent = "";
    }

    // Password validation
    const password = document.getElementById("signUpPassword").value;
    if (password.length < 6) {
        isValid = false;
        document.getElementById("passwordError").textContent = "Password must be at least 6 characters long.";
    } else {
        document.getElementById("passwordError").textContent = "";
    }

    // Confirm Password validation
    const confirmPassword = document.getElementById("confirmPassword").value;
    if (password !== confirmPassword) {
        isValid = false;
        document.getElementById("confirmPasswordError").textContent = "Passwords do not match.";
    } else {
        document.getElementById("confirmPasswordError").textContent = "";
    }

    // Prevent form submission if validation fails
    if (!isValid) {
        event.preventDefault();
    }
});

// Validation for Login Form
document.getElementById("loginForm").addEventListener("submit", function(event) {
    let isValid = true;

    // Email validation
    const email = document.getElementById("loginEmail").value;
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!email.match(emailPattern)) {
        isValid = false;
        document.getElementById("loginEmailError").textContent = "Please enter a valid email.";
    } else {
        document.getElementById("loginEmailError").textContent = "";
    }

    // Password validation
    const password = document.getElementById("loginPassword").value;
    if (password.length < 6) {
        isValid = false;
        document.getElementById("loginPasswordError").textContent = "Password must be at least 6 characters long.";
    } else {
        document.getElementById("loginPasswordError").textContent = "";
    }

    // Prevent form submission if validation fails
    if (!isValid) {
        event.preventDefault();
    }
});