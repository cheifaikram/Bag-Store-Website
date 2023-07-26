
document.addEventListener('DOMContentLoaded', function() {
  //DARK MODE
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

  // TESTIMONAALS SWIPER
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    grabCursor: true,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });


  const list = document.querySelectorAll('.list');
 function activeLink() {
    list.forEach((item) =>
    item.classList.remove('active'));
    this.classList.add('active');
  }

list.forEach((item) =>
item.addEventListener('click',activeLink));


// acount box
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

// timeline
  const timeline = document.querySelector('.timeline');
  timeline.addEventListener('click', function(event) {
    if (event.target.classList.contains('timeline-title')) {
      const timelineContent = event.target.nextElementSibling;
      
      timelineContent.classList.toggle('hidden');
    }
  });


});




  


  
