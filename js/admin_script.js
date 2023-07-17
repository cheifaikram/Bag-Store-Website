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
  }
};

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


function confirmDeleteUser(userId) {
  Swal.fire({
     icon: 'warning',
     title: 'Are you sure?',
     text: 'This action cannot be undone.',
     showCancelButton: true,
     confirmButtonColor: '#d33',
     cancelButtonColor: '#3085d6',
     confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
     if (result.isConfirmed) {
        // Proceed with the delete operation
        window.location.href = 'admin_users.php?delete=' + userId;
     }
  });
}







