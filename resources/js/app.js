import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('hamburger-button');
    const sidebar = document.getElementById('default-sidebar');
    let isSidebarOpen = false;

    if (toggleButton && sidebar) {
        toggleButton.addEventListener('click', (event) => {
            sidebar.classList.toggle('-translate-x-full');
            isSidebarOpen = !isSidebarOpen;
        });

        document.addEventListener('click', (event) => {
            const path = event.composedPath ? event.composedPath() : [];

            // Prevent closing when clicking inside sidebar or toggle button
            if (
                isSidebarOpen &&
                !sidebar.contains(event.target) &&
                !path.includes(toggleButton)
            ) {
                sidebar.classList.add('-translate-x-full');
                isSidebarOpen = false;
            }
        });
    }
});
