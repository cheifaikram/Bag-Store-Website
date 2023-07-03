
let userBtn = document.querySelector('#user-btn');
let accountBox = document.querySelector('.account-box');
let mainContainer = document.querySelector('.main--container');

userBtn.onclick = () => {
  accountBox.style.display = "block";
  mainContainer.style.zIndex = -1; // Set a lower z-index value for main--container
};

// Close the account box when clicking outside of it
document.onclick = (e) => {
  if (!accountBox.contains(e.target) && !userBtn.contains(e.target)) {
    accountBox.style.display = "none";
    mainContainer.style.zIndex = 1; // Restore the original z-index value for main--container
  }
};

const body = document.querySelector(".body");
const sun = document.querySelector(".sun");
const moon = document.querySelector(".moon");
const menu = document.querySelector(".menu");
const sidebar = document.querySelector(".sidebar");

const darkMode = 'dark--mode';

// Function to set the dark mode in local storage
const setDarkMode = (mode) => {
  localStorage.setItem('dark-mode', mode);
};

// Function to get the current dark mode
const getCurrentMode = () => document.body.classList.contains(darkMode) ? 'dark' : 'light';

// Check if dark mode is already selected in local storage
const selectedMode = localStorage.getItem('dark-mode');

// Apply the selected mode
if (selectedMode) {
  body.classList.add(selectedMode === 'dark' ? darkMode : '');
}

// Toggle between dark and light mode
moon.addEventListener('click', () => {
  body.classList.add(darkMode);
  setDarkMode('dark');
});

sun.addEventListener('click', () => {
  body.classList.remove(darkMode);
  setDarkMode('light');
});

// Toggle the sidebar menu
menu.addEventListener('click', () => {
  sidebar.classList.toggle('activemenu');
});

// Close the sidebar menu when clicking outside
document.addEventListener('click', (event) => {
  const targetElement = event.target;
  if (!targetElement.closest('.menu') && !targetElement.closest('.sidebar')) {
    sidebar.classList.remove('activemenu');
  }
});









