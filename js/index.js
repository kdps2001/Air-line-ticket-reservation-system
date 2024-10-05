// Get elements
const roundTripRadio = document.getElementById("roundTrip");
const oneWayRadio = document.getElementById("oneWay");
const returnDateContainer = document.getElementById("returnDateContainer");

// Toggle return date visibility
roundTripRadio.addEventListener("click", () => {
    returnDateContainer.style.display = "block";
});

oneWayRadio.addEventListener("click", () => {
    returnDateContainer.style.display = "none";
});
