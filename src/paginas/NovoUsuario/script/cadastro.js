async function cadastrarUsuario() {
    const payload = getInputNovoUsuario();  
    console.log("cadastrou");

    const response = await fetch("./../../../controle/cadastrarUsuario.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: payload,
    });

    const item = await response.json();
    if (item['isRegistred']) {
        clearInputs(); 
    }
}

function getInputNovoUsuario() {
    let nome = document.getElementById("nome");
    let email = document.getElementById("email");
    let senha = document.getElementById("senha");
    let telefone = document.getElementById("telefone");
    let nivelAcesso = document.getElementById("nivelAcesso");

    return JSON.stringify({
        nome: nome.value,
        email: email.value,
        senha: senha.value,
        telefone: telefone.value,
        nivelAcesso: nivelAcesso.value
    });
}

function clearInputs() {
    document.getElementById("nome").value = "";         
    document.getElementById("senha").value = "";        
    document.getElementById("telefone").value = "";     
    document.getElementById("nivelAcesso").value = ""; 
}