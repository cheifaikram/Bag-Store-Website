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
    // mainContainer.style.zIndex = 1; // Restore the original z-index value for main--container
  }
};

const body = document.querySelector(".body")
const sun = document.querySelector(".sun")
const moon = document.querySelector(".moon")

const darkMode = 'dark--mode';

// Function to set the dark mode in local storage
const setDarkMode = (mode) => {
  body.classList.toggle(darkMode, mode === 'dark');
  localStorage.setItem('dark-mode', mode);
};

// Function to remove dark mode from local storage
const removeDarkMode = () => {
  body.classList.remove(darkMode);
  localStorage.removeItem('dark-mode');
};

// Function to get the current dark mode
const getCurrentMode = () => document.body.classList.contains(darkMode) ? 'dark' : 'light';

// Check if dark mode is already selected in local storage
const selectedMode = localStorage.getItem('dark-mode');

// Apply the selected mode
if (selectedMode) {
  setDarkMode(selectedMode);
}

// Toggle between dark and light mode
moon.addEventListener('click', () => {
  setDarkMode('dark');
});

sun.addEventListener('click', () => {
  setDarkMode('light');
});

document.addEventListener('DOMContentLoaded', function() {
  let menu = document.querySelector(".menu");
  let sidebar = document.querySelector(".sidebar");
  let mainContainer = document.querySelector('.main--container');

  menu.onclick = function() {
    sidebar.classList.toggle("activemenu");
  }

  mainContainer.onclick = function() {
    sidebar.classList.remove("activemenu");
  }
});









