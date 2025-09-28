document.addEventListener("DOMContentLoaded", function() {
    const wrappers = document.querySelectorAll(".input-wrapper");

    wrappers.forEach(wrapper => {
        const passwordInput = wrapper.querySelector("input[type='password']");
        const showEye = wrapper.querySelector(".show-eye");
        const hideEye = wrapper.querySelector(".hide-eye");

        if (passwordInput && showEye && hideEye) {
            function togglePassword() {
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    showEye.style.display = "none";
                    hideEye.style.display = "block";
                } else {
                    passwordInput.type = "password";
                    showEye.style.display = "block";
                    hideEye.style.display = "none";
                }
            }

            showEye.addEventListener("click", togglePassword);
            hideEye.addEventListener("click", togglePassword);
        }
    });
});
