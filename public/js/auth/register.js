document.addEventListener("DOMContentLoaded", function() {
    const nameInput = document.getElementById("name");
    const lastnameInput = document.getElementById("lastname");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("password_confirmation");

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

    function validateName(input) {
        const value = input.value.trim();
        if (value === "") {
            input.style.borderColor = "red";
            createErrorMessage(input, "Este campo no puede estar vacío");
        } else if (value.length < 2) {
            input.style.borderColor = "red";
            createErrorMessage(input, "Debe tener al menos 2 caracteres");
        } else {
            input.style.borderColor = "#ccc";
            removeErrorMessage(input);
        }
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
            createErrorMessage(passwordInput, "Debe tener al menos 8 caracteres");
        } else if (!hasUppercase) {
            passwordInput.style.borderColor = "red";
            createErrorMessage(passwordInput, "Debe incluir al menos una mayúscula");
        } else {
            passwordInput.style.borderColor = "#ccc";
            removeErrorMessage(passwordInput);
        }
    }

    function validatePasswordConfirmation() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        if (confirmPassword === "") {
            confirmPasswordInput.style.borderColor = "red";
            createErrorMessage(confirmPasswordInput, "Debes confirmar tu contraseña");
        } else if (password !== confirmPassword) {
            confirmPasswordInput.style.borderColor = "red";
            createErrorMessage(confirmPasswordInput, "Las contraseñas no coinciden");
        } else {
            confirmPasswordInput.style.borderColor = "#ccc";
            removeErrorMessage(confirmPasswordInput);
        }
    }

    nameInput.onblur = () => validateName(nameInput);
    lastnameInput.onblur = () => validateName(lastnameInput);
    emailInput.onblur = validateEmail;
    passwordInput.onblur = validatePassword;
    confirmPasswordInput.onblur = validatePasswordConfirmation;
});
