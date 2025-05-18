import './bootstrap';

document.addEventListener('DOMContentLoaded', ()=>{
    const toggleButton = document.getElementById('hamburger-button');
    const sidebar = document.getElementById('default-sidebar');
    let isSidebarOpen = false;

    if(toggleButton && sidebar){
        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            isSidebarOpen = !isSidebarOpen;
        });

        document.addEventListener('click', (event) => {
            // Check if the clicked element is NOT the sidebar, NOT inside the sidebar, and NOT the hamburger button
            if (isSidebarOpen && !sidebar.contains(event.target) && event.target !== toggleButton) {
                sidebar.classList.add('-translate-x-full');
                isSidebarOpen = false;
            }
        });
    }
});