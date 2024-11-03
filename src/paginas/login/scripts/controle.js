const input = document.getElementById("email")
const err = document.getElementById("erro-1")
const entrarBtn = document.getElementById("entrarBtn")

input.addEventListener("keyup", (event) => {
    inputValue = event.target.value
    isEmailValid = true
    isPasswdValid = true
    if (validateEmail(inputValue) && inputValue.length > 1){
        err.innerHTML = `<li id="erro-1"></li>`
        isEmailValid = false
    }else if (inputValue.length == 0){
        isEmailValid = true
    }
    else{
        err.innerHTML = `<li id="erro-1">E-mail inválido</li>`
    }



    entrarBtn.disabled = isEmailValid && isPasswdValid
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