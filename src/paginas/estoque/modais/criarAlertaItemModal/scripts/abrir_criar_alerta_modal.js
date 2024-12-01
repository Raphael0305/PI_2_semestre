async function abrirCriarAlertaModal(){
    let criarAlertaModal = document.getElementById("crir_alerta_baixo_nivel")
    criarAlertaModal.classList.add('openCriarAlertaModel')
    await fillSelector()
}


function closeCriarAlertaModal(){
    let criarAlertaModal = document.getElementById("crir_alerta_baixo_nivel")
    let alerta_selector = document.getElementById("escluir_alerta")
    alerta_selector.innerHTML = `<option value="">Selecione um item</option>`
    criarAlertaModal.classList.remove('openCriarAlertaModel')
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