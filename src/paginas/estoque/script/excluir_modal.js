async function openExcluirModal(){
    const items = await getItems()
    console.log(items)
    let modal = getElementByID("excluir_item_modal")
    let selector = getElementByID("excluir_item_selector")
    modal.classList.add("open_excluir_modal")
    console.log(selector.value)
    items.forEach(element => {
        selector.innerHTML += `<option value="${element['ID_ingrediente']}">${element["nome"]}</option>`
    })
}

async function exluirItem(){
    let selector = getElementByID("excluir_item_selector")
    console.log(selector.value)
    const response = await fetch("../../../controle/excluir_item.php", {
        method:"POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            ID_ingrediente: selector.value
        })
    })

    closeEcluirModal()
    showItemsAtTable()
}

function closeEcluirModal(){
    let modal = getElementByID("excluir_item_modal")
    let selector = getElementByID("excluir_item_selector")
    selector.innerHTML = `<option>Selecione um item</option>`
    modal.classList.remove("open_excluir_modal")
}


document.addEventListener("keyup", (event) => {
    key = event.key

    if (key == "Escape"){
        closeEcluirModal()
    }
})

function getElementByID(elementId){
    return document.getElementById(elementId)
}

async function showItemsAtTable(){
    let table = getElementByID("table")
    let items = await getItems()
    console.log("abri")
    table.querySelector("tbody").innerHTML = `<tr></tr>`
    items.forEach(element =>{
        table.querySelector("tbody").innerHTML += `<tr>
                                    <td>${element['nome']}</td>
                                    <td>${element['categoria']}</td>
                                    <td>${element['fornecedor']}</td>
                                    <td>${element['quantidade']}</td>
                                    <td>${element['valorUn']}</td>
                                    <td>${element['data_validade']}</td>
                                    <td>${element['quantMin']}</td>
                                </tr>`
    })
}

function getElementByID(elementId){
    return document.getElementById(elementId)
}

async function getItems(){
    const response = await fetch("../../../controle/buscar_itens.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"

        }
    })

    return await response.json()
}