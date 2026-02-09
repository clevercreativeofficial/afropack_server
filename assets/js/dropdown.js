// dropdown
document.addEventListener("DOMContentLoaded", () => {
    const dropdown = document.querySelector(".dropdown");
    const caret = document.querySelector(".rotate-90");

    // mobile
    dropdown.addEventListener("click", () => {
        alert('Hi')
        dropdown.classList.toggle('max-h-4')
        dropdown.classList.toggle('max-h-[500px]')
        caret.classList.toggle('-rotate-90')
    });
});

// toggle menu on small devices
document.addEventListener("DOMContentLoaded", () => {
    const navItems = document.getElementById("navItems");
    const menuBar = document.getElementById("menu-bar");
    const overlay = document.querySelector(".overlay");
    const defaultIcon = '<i class="fi fi-rr-menu-burger text-lg translate-y-0.5"></i>';
    const closeIcon = '<i class="fi fi-rr-cross-small text-lg translate-y-0.5"></i>';
    
    menuBar.innerHTML = defaultIcon; // Ensure the default icon is set

    menuBar.addEventListener('click', () => {
        navItems.classList.toggle("-translate-x-[1024px]");
        overlay.classList.toggle("translate-x-[1024px]");

        // Toggle the icon
        if (navItems.classList.contains("-translate-x-[1024px]")) {
            menuBar.innerHTML = defaultIcon;
            document.body.style.overflowY = 'auto'; 
        } else {
            menuBar.innerHTML = closeIcon;
            document.body.style.overflowY = 'hidden';
        }
    });
});