
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

let body = document.querySelector(".body")
let sun = document.querySelector(".sun")
let moon = document.querySelector(".moon")
let menu = document.querySelector(".menu")
let sidebar = document.querySelector(".sidebar")

moon.onclick = function(){
    body.classList.add("dark--mode")
}
sun.onclick = function(){
    body.classList.remove("dark--mode")
}

menu.onclick = function(){
    sidebar.classList.toggle("activemenu")
}
mainContainer.onclick = function(){
    sidebar.classList.remove("activemenu")
}






