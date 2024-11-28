
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

function pegarDadosFormulario() {
    const nomeMarmita = document.getElementById('nomeMarmita').value;
    const precoMarmita = document.getElementById('precoMarmita').value;
    
    const ingrediente1 = document.getElementById('ingrediente1').value;
    const quantidade1 = document.getElementById('quantidade1').value;
    const unidade1 = document.getElementById('unidade1').value;

    const ingrediente2 = document.getElementById('ingrediente2').value;
    const quantidade2 = document.getElementById('quantidade2').value;
    const unidade2 = document.getElementById('unidade2').value;

    const ingrediente3 = document.getElementById('ingrediente3').value;
    const quantidade3 = document.getElementById('quantidade3').value;
    const unidade3 = document.getElementById('unidade3').value;

    return {
        nomeMarmita,
        precoMarmita,
        ingredientes: [
            { id: ingrediente1, quantidade: quantidade1, unidade: unidade1 },
            { id: ingrediente2, quantidade: quantidade2, unidade: unidade2 },
            { id: ingrediente3, quantidade: quantidade3, unidade: unidade3 }
        ]
    };
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