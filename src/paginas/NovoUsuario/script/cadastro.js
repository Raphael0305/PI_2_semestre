async function cadastrarUsuario() {
    const dados = getInputNovoUsuario();  

    const response = await fetch("./../../../controle/cadastrarUsuario.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: dados
    });

    if (!response.ok) {
        console.error("Erro na requisição dog:", response.status, response.statusText);
        return;
    }

    try {
        const resultado = await response.json();
        console.log("Resultado:", resultado);
        alert("cadastrado com sucesso!");
        console.log("Tudo certo chefe");
    } catch (error) {
        alert("Erro ao cadastrar :(");
        console.error("Erro ao traduzir o JSON", error);
    }
    limpa_legal();
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

//  FUNÇÕES AUXÍLIARES 
function limpa_legal() {
    document.getElementById("nome").value = "";         
    document.getElementById("senha").value = "";        
    document.getElementById("telefone").value = "";     
    document.getElementById("nivelAcesso").value = ""; 
}

async function validarFormulario() {
    const nome = document.getElementById('nome');
    const email = document.getElementById('email');
    const senha = document.getElementById('senha');
    const telefone = document.getElementById('telefone');
    const nivelAcesso = document.getElementById('nivelAcesso');

    let erros = [];

    if (!nome.value.trim()) erros.push("O campo 'Nome' é obrigatório.");
    if (!email.value.trim()) erros.push("O campo 'Email' é obrigatório.");
    if (!senha.value.trim()) erros.push("O campo 'Senha' é obrigatório.");
    if (!telefone.value.trim()) erros.push("O campo 'Telefone' é obrigatório.");
    if (!nivelAcesso.value.trim()) erros.push("O campo 'Nível de Acesso' é obrigatório.");

    if (erros.length > 0) {
        alert(erros.join("\n"));
        return;
    }
    await cadastrarUsuario();
}

