window.onload = () => {
    const name = document.querySelector('#name');
    const email = document.querySelector('#email');
    const password = document.querySelector('#password');
    const password_confirmation = document.querySelector('#password_confirmation');
    const nameChecked = document.querySelector('#namechecked');
    const emailchecked = document.querySelector('#emailchecked');
    const passwordchecked = document.querySelector('#passwordchecked');
    const password_confirmationchecked = document.querySelector('#password_confirmationchecked');

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
        validate(email, emailchecked, e.target.value.includes("@") && e.target.value.includes("."))
    })
    password.addEventListener('input', (e) => {
        validate(password, passwordchecked, e.target.value.length > 3)
    })
    password_confirmation.addEventListener('input', (e) => {
        validate(password_confirmation, password_confirmationchecked, e.target.value === password.value)
    })

};


