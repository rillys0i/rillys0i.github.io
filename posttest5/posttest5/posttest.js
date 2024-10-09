// Get elements
const popupOverlay = document.getElementById('popup-overlay');
const closePopupBtn = document.getElementById('close-popup');
const toggleButton = document.getElementById('mode-toggle');
const donateBtns = document.querySelectorAll('.donate-btn');
const burger = document.getElementById('burger');
const navLinks = document.getElementById('nav-links');
const body = document.body;

// Get all donate buttons
donateBtns.forEach(btn => {
btn.addEventListener('click', () => {
    popupOverlay.style.display = 'flex';
});
});

// Add event listeners for all donate buttons
donateBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        popupOverlay.style.display = 'flex';
    });
});

// Close popup
closePopupBtn.addEventListener('click', () => {
    popupOverlay.style.display = 'none';
});

// Close popup when clicking outside the popup
popupOverlay.addEventListener('click', (e) => {
    if (e.target === popupOverlay) {
        popupOverlay.style.display = 'none';
    }
});

// Event Listener for Burger Menu
burger.addEventListener('click', () => {
    navLinks.classList.toggle('mobile');
});

// Toggle Dark Mode
toggleButton.addEventListener('click', () => {
    body.classList.toggle('dark-mode');
    toggleButton.textContent = body.classList.contains('dark-mode') ? '☀️' : '🌙';
});