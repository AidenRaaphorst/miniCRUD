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

const loginPassword = document.querySelector(".login input[type=password]");
const loginButton = document.querySelector(".login input[type=submit]");
const loginForm = document.querySelector(".login form");

loginButton.addEventListener("click", (e) => {
	e.preventDefault();

	let msg = "";

	if (loginPassword.value === "" || loginPassword.value.length < 8) {
		msg += "Wachtwoord is te kort (minimaal 8 tekens)\n";
	}

	if (msg == "") {
		loginForm.submit();
	} else {
		alert(msg.trim());
	}
});

const registerPostalCode = document.querySelector(".register input[name=postalcode]");
const registerPassword1 = document.querySelector(".register input[name=password]");
const registerPassword2 = document.querySelector(".register input[name=password-repeat]");
const registerButton = document.querySelector(".register input[type=submit]");
const registerForm = document.querySelector(".register form");

registerButton.addEventListener("click", (e) => {
	e.preventDefault();

	let msg = "";

	registerPostalCode.innerHTML = registerPostalCode.innerHTML.replace(" ", "");

	if (registerPassword1.value.length < 8) {
		msg += "Wachtwoord is te kort (minimaal 8 tekens)\n";
	}
	if (registerPassword2.value != registerPassword1.value) {
		msg += "Wachtwoorden zijn niet hetzelfde\n";
	}

	if (msg == "") {
		registerForm.submit();
	} else {
		alert(msg.trim());
	}
});
