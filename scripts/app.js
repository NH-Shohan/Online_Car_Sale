// Dynamic content ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

const formInputs = document.querySelectorAll("input");

formInputs.forEach((input) => {
  input.addEventListener("focus", () => {
    input.style.backgroundColor = "yellow";
  });

  input.addEventListener("blur", () => {
    input.style.backgroundColor = "white";
  });
});

const buttons = document.querySelectorAll("button");

buttons.forEach((button) => {
  button.addEventListener("mouseover", () => {
    button.style.backgroundColor = "lightblue";
  });

  button.addEventListener("mouseout", () => {
    button.style.backgroundColor = "";
  });
});
