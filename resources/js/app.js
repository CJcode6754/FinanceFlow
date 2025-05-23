import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    // Sidebar toggle
    const toggleButton = document.getElementById("hamburger-button");
    const sidebar = document.getElementById("default-sidebar");
    let isSidebarOpen = false;

    if (toggleButton && sidebar) {
        toggleButton.addEventListener("click", () => {
            sidebar.classList.toggle("-translate-x-full");
            isSidebarOpen = !isSidebarOpen;
        });

        document.addEventListener("click", (event) => {
            const path = event.composedPath ? event.composedPath() : [];
            if (
                isSidebarOpen &&
                !sidebar.contains(event.target) &&
                !path.includes(toggleButton)
            ) {
                sidebar.classList.add("-translate-x-full");
                isSidebarOpen = false;
            }
        });
    }

    // Toggle password visibility
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");
    const toggleIcon = document.getElementById("toggleIcon");

    if (togglePassword && passwordInput && toggleIcon) {
        togglePassword.addEventListener("click", () => {
            const type =
                passwordInput.getAttribute("type") === "password"
                    ? "text"
                    : "password";
            passwordInput.setAttribute("type", type);

            toggleIcon.classList.toggle("fa-eye");
            toggleIcon.classList.toggle("fa-eye-slash");
        });
    }

    // Toggle confirm password visibility
    const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");
    const confirmInput = document.getElementById("password_confirmation");
    const toggleConfirmIcon = document.getElementById("toggleConfirmIcon");

    if (toggleConfirmPassword && confirmInput && toggleConfirmIcon) {
        toggleConfirmPassword.addEventListener("click", () => {
            const type =
                confirmInput.getAttribute("type") === "password"
                    ? "text"
                    : "password";
            confirmInput.setAttribute("type", type);

            toggleConfirmIcon.classList.toggle("fa-eye");
            toggleConfirmIcon.classList.toggle("fa-eye-slash");
        });
    }

    // Profile dropdown toggle
    const profileToggle = document.getElementById("profileToggle");
    const dropdownMenu = document.getElementById("dropdownMenu");
    const wrapper = document.getElementById("profileDropdownWrapper");

    if (profileToggle && dropdownMenu && wrapper) {
        profileToggle.addEventListener("click", () => {
            dropdownMenu.classList.toggle("hidden");
        });

        document.addEventListener("click", (e) => {
            if (!wrapper.contains(e.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });
    }
});
