// let accountBox = document.querySelector('.header .account-box');

// document.querySelector('#user-btn').onclick = () =>{
//    // accountBox.classList.toggle('active');
//    accountBox.style.display = "block";

// }


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



