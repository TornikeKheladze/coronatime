window.onload = () => {
    const name = document.querySelector('#name');
    const email = document.querySelector('#email');
    const password = document.querySelector('#password');
    const passwordConfirmation = document.querySelector('#password_confirmation');
    const nameChecked = document.querySelector('#namechecked');
    const emailChecked = document.querySelector('#emailchecked');
    const passwordChecked = document.querySelector('#passwordchecked');
    const passwordConfirmationChecked = document.querySelector('#password_confirmationchecked');

    const validate = (element, checked, rule) => {
        if (rule) {
            element.classList.add('border-green-600')
            checked.classList.remove('hidden')
        } else {
            element.classList.remove('border-green-600')
            checked.classList.add('hidden')
        }
    }
    name.addEventListener('input', (e) => {
        validate(name, nameChecked, e.target.value.length > 3)
    })
    email.addEventListener('input', (e) => {
        validate(email, emailChecked, e.target.value.includes("@") && e.target.value.includes("."))
    })
    password.addEventListener('input', (e) => {
        validate(password, passwordChecked, e.target.value.length > 3)
    })
    passwordConfirmation.addEventListener('input', (e) => {
        validate(passwordConfirmation, passwordConfirmationChecked, e.target.value === password.value)
    })

};


