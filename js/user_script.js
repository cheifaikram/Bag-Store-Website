
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
  mainContainer.style.zIndex = -1; // Set a lower z-index value for main--container
};

// Close the account box when clicking outside of it
document.onclick = (e) => {
  if (!accountBox.contains(e.target) && !userBtn.contains(e.target)) {
    accountBox.style.display = "none";
  }
};




// Get the DOM elements for the image carousel
const wrapper = document.querySelector(".wrapper"),
  carousel = document.querySelector(".carousel"),
  images = document.querySelectorAll("img"),
  buttons = document.querySelectorAll(".button");

let imageIndex = 1,
  intervalId;

// Define function to start automatic image slider
const autoSlide = () => {
  // Start the slideshow by calling slideImage() every 2 seconds
  intervalId = setInterval(() => slideImage(++imageIndex), 2000);
};
// Call autoSlide function on page load
autoSlide();

// A function that updates the carousel display to show the specified image
const slideImage = () => {
  // Calculate the updated image index
  imageIndex = imageIndex === images.length ? 0 : imageIndex < 0 ? images.length - 1 : imageIndex;
  // Update the carousel display to show the specified image
  carousel.style.transform = `translate(-${imageIndex * 100}%)`;
};

// A function that updates the carousel display to show the next or previous image
const updateClick = (e) => {
  // Stop the automatic slideshow
  clearInterval(intervalId);
  // Calculate the updated image index based on the button clicked
  imageIndex += e.target.id === "next" ? 1 : -1;
  slideImage(imageIndex);
  // Restart the automatic slideshow
  autoSlide();
};

// Add event listeners to the navigation buttons
buttons.forEach((button) => button.addEventListener("click", updateClick));

// Add mouseover event listener to wrapper element to stop auto sliding
wrapper.addEventListener("mouseover", () => clearInterval(intervalId));
// Add mouseleave event listener to wrapper element to start auto sliding again
wrapper.addEventListener("mouseleave", autoSlide);
