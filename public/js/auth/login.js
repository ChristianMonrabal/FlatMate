document.addEventListener("DOMContentLoaded", function() {
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");

    function createErrorMessage(input, message) {
        let error = input.parentNode.parentNode.querySelector(".input-error");
        if (!error) {
            error = document.createElement("div");
            error.className = "input-error";
            error.style.paddingTop = "3px";
            error.style.paddingLeft = "14px";
            input.parentNode.parentNode.appendChild(error);
        }
        error.textContent = message;
    }


    function removeErrorMessage(input) {
        const error = input.parentNode.parentNode.querySelector(".input-error");
        if (error) error.remove();
    }

    function validateEmail() {
        const email = emailInput.value.trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === "") {
            emailInput.style.borderColor = "red";
            createErrorMessage(emailInput, "El correo no puede estar vacío");
        } else if (!emailPattern.test(email)) {
            emailInput.style.borderColor = "red";
            createErrorMessage(emailInput, "Ingresa un correo válido");
        } else {
            emailInput.style.borderColor = "#ccc";
            removeErrorMessage(emailInput);
        }
    }

    function validatePassword() {
        const password = passwordInput.value;
        const hasUppercase = /[A-Z]/.test(password);
        if (password === "") {
            passwordInput.style.borderColor = "red";
            createErrorMessage(passwordInput, "La contraseña no puede estar vacía");
        } else if (password.length < 8) {
            passwordInput.style.borderColor = "red";
            createErrorMessage(passwordInput, "La contraseña debe tener al menos 8 caracteres");
        } else if (!hasUppercase) {
            passwordInput.style.borderColor = "red";
            createErrorMessage(passwordInput, "La contraseña debe tener al menos una mayúscula");
        } else {
            passwordInput.style.borderColor = "#ccc";
            removeErrorMessage(passwordInput);
        }
    }

    emailInput.onblur = validateEmail;
    passwordInput.onblur = validatePassword;
});
