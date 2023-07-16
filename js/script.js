const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
const sign_in_btn2 = document.querySelector("#sign-in-btn2");
const sign_up_btn2 = document.querySelector("#sign-up-btn2");
sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});
sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});
sign_up_btn2.addEventListener("click", () => {
    container.classList.add("sign-up-mode2");
});
sign_in_btn2.addEventListener("click", () => {
    container.classList.remove("sign-up-mode2");
});


function toggleOptions() {
    var optionsList = document.getElementById("options_list");
    var displayValue = window.getComputedStyle(optionsList).getPropertyValue('display');
    if (displayValue === "none") {
      optionsList.style.display = "block";
    } else {
      optionsList.style.display = "none";
    }
  }

function selectOption(value) {
  var selectedText = document.getElementById("selected_text");
  selectedText.textContent = value;

  var userInput = document.getElementById("user_type_input");
  userInput.value = value;

  var optionsList = document.getElementById("options_list");
  optionsList.style.display = "none";
}

