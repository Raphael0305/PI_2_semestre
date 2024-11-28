document.getElementById('botaoCadastrar').addEventListener('click', async (e) => {
    e.preventDefault(); // Evita o comportamento padrão de recarregar a página
    await enviarDadosFormulario(); // Chama a função de envio
});


async function getItems(){
    const response = await fetch("../../../controle/buscar_itens.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        }
    })
    
    return await response.json()
}

async function atualizarSelector() {
    let items = await getItems();
    console.log(items);  
    let selector1 = document.getElementById("ingrediente1");
    let selector2 = document.getElementById("ingrediente2");
    let selector3 = document.getElementById("ingrediente3");
    
    selector1.innerHTML = `<option value="">Selecione um item</option>`;
    selector2.innerHTML = `<option value="">Selecione um item</option>`;
    selector3.innerHTML = `<option value="">Selecione um item</option>`;
    
    items.forEach(element => {
        selector1.innerHTML += `<option value="${element['ID_ingrediente']}">${element['nome']}</option>`;
        selector2.innerHTML += `<option value="${element['ID_ingrediente']}">${element['nome']}</option>`;
        selector3.innerHTML += `<option value="${element['ID_ingrediente']}">${element['nome']}</option>`;
    });
}

document.addEventListener('DOMContentLoaded', function() {
    atualizarSelector();
});

async function enviarDadosFormulario(){
    const dados = pegarDadosFormulario();

    const response = await fetch("../../../controle/cadastrarMarmita.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(dados) 
    });

    const resultado = await response.json();
    console.log("Em, viado com sucesso");
    limpaCampos()
}

function pegarDadosFormulario() {
    const nomeMarmita = document.getElementById('nomeMarmita').value;
    const precoMarmita = document.getElementById('precoMarmita').value;
    
    const ingrediente1 = document.getElementById('ingrediente1').value;
    const quantidade1 = document.getElementById('quantidade1').value;


    const ingrediente2 = document.getElementById('ingrediente2').value;
    const quantidade2 = document.getElementById('quantidade2').value;


    const ingrediente3 = document.getElementById('ingrediente3').value;
    const quantidade3 = document.getElementById('quantidade3').value;


    return {
        nomeMarmita,
        precoMarmita,
        ingredientes: [
            { id: ingrediente1, quantidade: quantidade1},
            { id: ingrediente2, quantidade: quantidade2},
            { id: ingrediente3, quantidade: quantidade3}
        ]
    };
    
}


function limpaCampos() {

    let nomeMarmita = document.getElementById("nomeMarmita");
    let precoMarmita = document.getElementById("precoMarmita");
    let ingrediente1 = document.getElementById("ingrediente1");
    let quantidade1 = document.getElementById("quantidade1");
    let unidade1 = document.getElementById("unidade1");
    let ingrediente2 = document.getElementById("ingrediente2");
    let quantidade2 = document.getElementById("quantidade2");
    let unidade2 = document.getElementById("unidade2");
    let ingrediente3 = document.getElementById("ingrediente3");
    let quantidade3 = document.getElementById("quantidade3");
    let unidade3 = document.getElementById("unidade3");

    nomeMarmita.value = "";
    precoMarmita.value = "";
    ingrediente1.value = "";
    quantidade1.value = "";
    unidade1.value = "gramas"; 
    ingrediente2.value = "";
    quantidade2.value = "";
    unidade2.value = "gramas";
    ingrediente3.value = "";
    quantidade3.value = "";
    unidade3.value = "gramas";
}




function atualizarUnidade(inputId, unidadeId) {
    var quantidade = document.getElementById(inputId).value;
    var unidadeSelect = document.getElementById(unidadeId);

    if (quantidade >= 1000) {
        unidadeSelect.value = "quilos"; 
    } else {
        unidadeSelect.value = "gramas"; 
    }
}