const list = document.querySelectorAll('.list');
function activeLink() {
    list.forEach((item) =>
    item.classList.remove('active'));
    this.classList.add('active');
}

list.forEach((item) =>
item.addEventListener('click',activeLink));


let userBtn = document.querySelector('#user-btn');
let accountBox = document.querySelector('.account-box');
let mainContainer = document.querySelector('.main--container');

userBtn.onclick = () => {
  accountBox.style.display = "block";
  mainContainer.style.zIndex = -1;
};


// Close the account box when clicking outside of it
document.onclick = (e) => {
  if (!accountBox.contains(e.target) && !userBtn.contains(e.target)) {
    accountBox.style.display = "none";
  }
};

//DARK MODE
const body = document.querySelector(".body")
const sun = document.querySelector(".sun")
const moon = document.querySelector(".moon")

const darkMode = 'dark--mode';

const setDarkMode = (mode) => {
body.classList.toggle(darkMode, mode === 'dark');
localStorage.setItem('dark-mode', mode);
};

const removeDarkMode = () => {
body.classList.remove(darkMode);
localStorage.removeItem('dark-mode');
};

const getCurrentMode = () => document.body.classList.contains(darkMode) ? 'dark' : 'light';

const selectedMode = localStorage.getItem('dark-mode');

if (selectedMode) {
setDarkMode(selectedMode);
}

moon.addEventListener('click', () => {
setDarkMode('dark');
});

sun.addEventListener('click', () => {
setDarkMode('light');
});