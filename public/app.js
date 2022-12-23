window.onload = () => {
    const password = document.querySelector("#password");
    const inputs = document.querySelectorAll("input");

    inputs.forEach((input) => {
        if (input.name === "password") {
            input.addEventListener("input", (e) => {
                validate(input, e.target.value.length > 3);
            });
        }
        if (input.name === "password_confirmation") {
            input.addEventListener("input", (e) => {
                validate(input, e.target.value === password.value);
            });
        }
        if (input.name === "email") {
            input.addEventListener("input", (e) => {
                validate(
                    input,
                    e.target.value.includes("@") && e.target.value.includes(".")
                );
            });
        }
        if (input.name === "name") {
            input.addEventListener("input", (e) => {
                validate(input, e.target.value.length > 3);
            });
        }
        if (input.name === "name_mail") {
            input.addEventListener("input", (e) => {
                validate(input, e.target.value.length > 3);
            });
        }
    });

    const validate = (element, rule) => {
        if (rule) {
            element.classList.add("val");
            document
                .querySelector(`#${element.name}checked`)
                .classList.remove("hidden");
        } else {
            element.classList.remove("val");
            document
                .querySelector(`#${element.name}checked`)
                .classList.add("hidden");
        }
    };
};
