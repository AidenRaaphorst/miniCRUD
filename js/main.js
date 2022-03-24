const toggles = document.querySelectorAll(".toggle");

toggles.forEach((toggle) => {
	toggle.addEventListener("click", () => {
		// Convert the data to array
		const allElementNames = toggle.getAttribute("data-toggle").split(" ");

		// For each element in the array, toggle the display: flex/block <--> none
		allElementNames.forEach((elem) => {
			elem = document.querySelector(elem);

			if (getComputedStyle(elem).display == "flex" || getComputedStyle(elem).display == "block") {
				elem.style.display = "none";
			} else {
				elem.style.display = "flex";
			}
		});
	});
});
