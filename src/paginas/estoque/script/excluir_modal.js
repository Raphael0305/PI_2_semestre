async function openExcluirModal(){
    console.log(getIngredientes())
    const items = await getIngredientes()
    let modal = getElementByID("excluir_item_modal")
    let selector = getElementByID("item_selector")
    modal.classList.add("open_excluir_modal")

    items.forEach((element, index) => {
        selector.innerHTML += `<option value="${element['id_ingrediente']}">${element["nome"]}</option>`
    });
}

async function exluirItem(){
    let selector = getElementByID("item_selector")
    const response = await fetch("../../../controle/excluir_item.php", {
        method:"POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id_ingrediente: selector.value
        })
    })

    closeEcluirModal()
}

function closeEcluirModal(){
    let modal = getElementByID("excluir_item_modal")
    let selector = getElementByID("item_selector")
    selector.innerHTML = `<option>Selecione um item</option>`
    modal.classList.remove("open_excluir_modal")
}

async function getIngredientes(){
    const response = await fetch("../../../controle/buscar_items.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"

        }
    })

    return await response.json()
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