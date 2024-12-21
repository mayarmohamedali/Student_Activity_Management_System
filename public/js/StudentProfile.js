// Get the toggle checkbox
const toggle = document.getElementById('darkModeToggle');

// Check if dark mode is saved in localStorage
if (localStorage.getItem('darkMode') === 'enabled') {
    document.body.classList.add('dark-mode');
    toggle.checked = true; // Set toggle to checked
}

// Add event listener to the toggle
toggle.addEventListener('change', () => {
    if (toggle.checked) {
        document.body.classList.add('dark-mode');
        localStorage.setItem('darkMode', 'enabled'); // Save preference
    } else {
        document.body.classList.remove('dark-mode');
        localStorage.setItem('darkMode', 'disabled'); // Save preference
    }
});
