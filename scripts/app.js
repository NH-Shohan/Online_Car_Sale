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

// search page ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

const carsDatabase = [
  { model: "Sedan", location: "New York", image: "./assets/sedan.jpg" },
  { model: "SUV", location: "Los Angeles", image: "./assets/suv.jpg" },
  { model: "Hatchback", location: "Chicago", image: "./assets/hatchback.jpg" },
  {
    model: "Convertible",
    location: "Miami",
    image: "./assets/convertible.jpg",
  },
  { model: "Compact", location: "Houston", image: "./assets/compact.jpg" },
  { model: "Minivan", location: "Dallas", image: "./assets/minivan.jpg" },
  {
    model: "Sports Car",
    location: "Phoenix",
    image: "./assets/sports_car.jpg",
  },
  { model: "Truck", location: "Denver", image: "./assets/truck.jpg" },
  { model: "Electric", location: "Seattle", image: "./assets/electric.jpg" },
  { model: "Luxury", location: "Boston", image: "./assets/luxury.jpg" },
  {
    model: "Crossover",
    location: "San Francisco",
    image: "./assets/crossover.jpg",
  },
  { model: "Hybrid", location: "Atlanta", image: "./assets/hybrid.jpg" },
  { model: "Coupe", location: "Washington D.C.", image: "./assets/coupe.jpg" },
  { model: "Van", location: "Orlando", image: "./assets/van.jpg" },
  { model: "Off-Road", location: "Las Vegas", image: "./assets/Off-Road.jpg" },
  { model: "Economy", location: "Detroit", image: "./assets/economy.jpg" },
  { model: "Classic", location: "Nashville", image: "./assets/classic.jpg" },
  { model: "Wagon", location: "Minneapolis", image: "./assets/wagon.jpg" },
  {
    model: "Luxury SUV",
    location: "Portland",
    image: "./assets/luxury_suv.jpg",
  },
  { model: "Midsize", location: "Philadelphia", image: "./assets/midsize.jpg" },
  {
    model: "Performance",
    location: "Austin",
    image: "./assets/performance.jpg",
  },
];

const carList = document.getElementById("carList");

function createCarCards() {
  carsDatabase.forEach((car) => {
    const card = document.createElement("div");
    
    const imageItem = document.createElement("img");
    const modelItem = document.createElement("h3");
    const locationItem = document.createElement("p");

    imageItem.src = car.image;
    imageItem.alt = car.model;
    modelItem.textContent = car.model;
    locationItem.textContent = car.location;

    card.appendChild(imageItem);
    card.appendChild(modelItem);
    card.appendChild(locationItem);

    carList.appendChild(card);
  });
}

function searchCars() {
  const modelInput = document.getElementById("model").value.toLowerCase();
  const locationInput = document.getElementById("location").value.toLowerCase();

  carList.innerHTML = "";
  let hasCar = false;

  carsDatabase.forEach((car) => {
    const model = car.model.toLowerCase();
    const location = car.location.toLowerCase();

    if (model.includes(modelInput) && location.includes(locationInput)) {
      hasCar = true;

      const card = document.createElement("div");
      const imageItem = document.createElement("img");
      const modelItem = document.createElement("h3");
      const locationItem = document.createElement("p");

      imageItem.src = car.image;
      imageItem.alt = car.model;
      modelItem.textContent = car.model;
      locationItem.textContent = car.location;

      card.appendChild(imageItem);
      card.appendChild(modelItem);
      card.appendChild(locationItem);

      carList.appendChild(card);
    }
  });

  const noCarMessage = document.getElementById("noCarMessage");
  noCarMessage.textContent = hasCar ? "" : "Coming soon";
}

createCarCards();
