document.addEventListener("DOMContentLoaded", () => {
const input = document.getElementById("email")
const passwd = document.getElementById("passwd")
const passwdError = document.getElementById("passwd_error")
const err = document.getElementById("erro-1")
const entrarBtn = document.getElementById("entrarBtn")
isEmailValid = false
isPasswdValid = false



input.addEventListener("keyup", (event) => {
    inputValue = event.target.value
    if (validateEmail(inputValue) && inputValue.length > 1){
        err.innerHTML = `<li id="erro-1"></li>`
        isEmailValid = true
    }else if (inputValue.length == 0){
        isEmailValid = false
    }
    else{
        err.innerHTML = `<li id="erro-1">E-mail inválido</li>`
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
        passwdError.innerHTML = `<li>Senha validada</li>`
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

console.log(`E-mail valido? ${isEmailValid}`)
console.log(`Senha valida? ${isPasswdValid}`)


function updateButtonState() {
    entrarBtn.disabled = !(isEmailValid && isPasswdValid);
}
})


function validateEmail(email){
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailRegex.test(email)){
        console.log(emailRegex.test(email))
        return true
    }else{
        console.log(emailRegex.test(email))
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