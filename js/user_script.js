

//DARK MODE
document.addEventListener('DOMContentLoaded', function() {
  const userBody = document.querySelector(".user-body");
  const userSun = document.querySelector(".user-sun");
  const userMoon = document.querySelector(".user-moon");

  const userDarkMode = 'user-dark-mode';

  const setUserDarkMode = (mode) => {
    userBody.classList.toggle(userDarkMode, mode === 'dark');
    localStorage.setItem('user-dark-mode', mode);
  };

  const removeUserDarkMode = () => {
    userBody.classList.remove(userDarkMode);
    localStorage.removeItem('user-dark-mode');
  };

  const getUserCurrentMode = () => userBody.classList.contains(userDarkMode) ? 'dark' : 'light';

  const selectedUserMode = localStorage.getItem('user-dark-mode');

  if (selectedUserMode) {
    setUserDarkMode(selectedUserMode);
  }

  userMoon.addEventListener('click', () => {
    setUserDarkMode('dark');
  });

  userSun.addEventListener('click', () => {
    setUserDarkMode('light');
  });
  });

  
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


document.addEventListener('DOMContentLoaded', function() {
  const timeline = document.querySelector('.timeline');

  timeline.addEventListener('click', function(event) {
    if (event.target.classList.contains('timeline-title')) {
      const timelineContent = event.target.nextElementSibling;
      
      timelineContent.classList.toggle('hidden');
    }
  });
});


document.addEventListener('DOMContentLoaded', function() {
var testimonials = document.getElementById('testimonials');
var control1 = document.getElementById('control1');
var control2 = document.getElementById('control2');
var control3 = document.getElementById('control3');


control1.onclick=function(){
    testimonials.style.transform = "translateX(870px)";
    control1.classList.add("active");
    control2.classList.remove("active");
    control3.classList.remove("active");
}

control2.onclick=function(){
    testimonials.style.transform = "translateX(0px)";
    control1.classList.remove("active");
    control2.classList.add("active");
    control3.classList.remove("active");
}

control3.onclick=function(){
    testimonials.style.transform = "translateX(-870px)";
    control1.classList.remove("active");
    control2.classList.remove("active");
    control3.classList.add("active");
}});