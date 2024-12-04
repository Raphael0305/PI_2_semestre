async function abrirCriarAlertaModal(){
    const criarAlertaModal = document.getElementById("criar_alerta_baixo_nivel");
    criarAlertaModal.classList.add('open_criar_alerta_modal');
    await fillSelector();
}


function closeCriarAlertaModal(){
    const criarAlertaModal = document.getElementById("criar_alerta_baixo_nivel");
    const alertaSelector = document.getElementById("criar_alerta_selector");
    alertaSelector.innerHTML = `<option value="">Selecione um item</option>`
    criarAlertaModal.classList.remove('open_criar_alerta_modal')
}



async function getItems(){
    const response = await fetch('../../../../../controle/buscar_itens.php', {
        method: "POST",
        headers: {
            "Content": "application/json"
        },
    })
    items = await response.json()
    return items
}

async function fillSelector(){
    items = await getItems()
    let alerta_selector = document.getElementById('criar_alerta_selector')
    items.forEach(element => {
        alerta_selector.innerHTML += `<option value="${element['ID_ingrediente']}">${element['nome']}</option>`
    });
}