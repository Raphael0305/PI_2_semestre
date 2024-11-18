function openPopup(){
    let modal = getElementByID("cadastrar_item_modal")
    modal.classList.add("open-modal")
}
function closeModal(){
    let modal = getElementByID("cadastrar_item_modal")
    modal.classList.remove("open-modal")
    clearInputs()
}


async function cadastraItem() {
    payload = getInputsName()
    const response = await fetch("../../../controle/cadastra_item.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: payload
    }
    )
    item = await response.json()
    if (item['isRegistered']){
        closeModal()
    }

}

function getInputsName(){
    let nome = getElementByID("nome")
    let categoria = getElementByID("categoria")
    let fornecedor = getElementByID("fornecedor")
    let quantidade = getElementByID("quantidade")
    let valorUn = getElementByID("valorUn")
    let data_validade = getElementByID("data_validade")
    return JSON.stringify({
        nome: nome.value,
        categoria: categoria.value,
        fornecedor: fornecedor.value,
        quantidade: quantidade.value,
        valorUn: valorUn.value,
        data_validade: data_validade.value
    })

}

function clearInputs(){
    let nome = getElementByID("nome")
    nome.value = null
    let categoria = getElementByID("categoria")
    categoria.value = null
    let fornecedor = getElementByID("fornecedor")
    fornecedor.value = null
    let quantidade = getElementByID("quantidade")
    quantidade.value = null
    let valorUn = getElementByID("valorUn")
    valorUn.value = null
    let data_validade = getElementByID("data_validade")
    data_validade.value = null
}

function getElementByID(elementId){
    return document.getElementById(elementId)
}


document.addEventListener("keyup", (event) => {
    key = event.key

    if (key == "Escape"){
        closeModal()
    }
})