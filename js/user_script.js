const wrapper = document.querySelector(".wrapper");
const carousel = document.querySelector(".carousel");
const images = document.querySelectorAll(".img");
const buttons = document.querySelectorAll(".button");

let imageIndex = 1;
let intervalId;

const autoSlide = () => {
  intervalId = setInterval(() => slideImage(++imageIndex), 2000);
};
autoSlide();

const slideImage = () => {
  imageIndex = imageIndex === images.length ? 0 : imageIndex < 0 ? images.length - 1 : imageIndex;
  carousel.style.transform = `translate(-${imageIndex * 100}%)`;
};

const updateClick = (e) => {
  clearInterval(intervalId);
  imageIndex += e.target.id === "next" ? 1 : -1;
  slideImage(imageIndex);
  autoSlide();
};

buttons.forEach((button) => button.addEventListener("click", updateClick));
wrapper.addEventListener("mouseover", () => clearInterval(intervalId));
wrapper.addEventListener("mouseleave", autoSlide);






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



