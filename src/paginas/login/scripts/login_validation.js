document.addEventListener("DOMContentLoaded", () => {
const email = document.getElementById("email")
const passwd = document.getElementById("passwd")
const email_error = document.getElementById("email_error_display")
const passwdError = document.getElementById("password_error_display")
const entrarBtn = document.getElementById("entrarBtn")
isEmailValid = false
isPasswdValid = false



email.addEventListener("keyup", (event) => {
    const key = event.key;
    const alfanumericRegex = /^[a-zA-Z0-9!@#$%^&*()_+={}\[\]:;"'<>,.?\/-]*$/
    if (key === "Backspace"){
        updateButtonState()
    }
    if (!alfanumericRegex.test(key)) {
        return
    }

    let localEmail = email.value
    if (validateEmail(localEmail) && localEmail.length > 1){
        email_error.innerHTML = `<li></li>`
        isEmailValid = true
    }else if (localEmail.length == 0){
        isEmailValid = false
    }
    else{
        email_error.innerHTML = `<li>E-mail inválido</li>`
        isEmailValid = false
    }
    updateButtonState()
})

passwd.addEventListener("keyup", (event) => {
    const key = event.key;
    const alfanumericRegex = /^[a-zA-Z0-9!@#$%^&*()_+={}\[\]:;"'<>,.?\/-]*$/
    if (key === "Backspace"){
        updateButtonState()
    }
    if (!alfanumericRegex.test(key)) {
        return
    }

    let localPasswd = passwd.value
    if (validatePassword(localPasswd.trim()) && localPasswd.length > 1){
        passwdError.innerHTML = `<li></li>`
        isPasswdValid = true
    }
    else if (localPasswd.length == 0){
        passwdError.innerHTML = `<li></li>`
    }
    else{
        passwdError.innerHTML = `<li>Senha invalida</li>`
        isPasswdValid = false
    }
    updateButtonState()
})


function updateButtonState() {
    entrarBtn.disabled = !(isEmailValid && isPasswdValid);
}
})


function validateEmail(email){
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailRegex.test(email)){
        return true
    }else{
        return false
    }
}

function validatePassword(passwd){
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    isValid = false
    if (passwordRegex.test(passwd)){
        return !isValid
    }
    return isValid
}