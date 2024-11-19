function openPopup(){
    let modal = getElementByID("cadastrar_item_modal")
    modal.classList.add("open-modal")
}
function closeModal(){
    let modal = getElementByID("cadastrar_item_modal")
    modal.classList.remove("open-modal")
    clearInputs()
    showItemsAtTable()
    
}


async function cadastraItem() {
    payload = getInputsName()
    console.log("cadastrou")
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

async function showItemsAtTable(){
    let table = getElementByID("table_body_display")
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
                                </tr>`
    })
}

function getElementByID(elementId){
    return document.getElementById(elementId)
}

async function getItems(){
    const response = await fetch("../../../controle/buscar_items.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"

        }
    })

    return await response.json()
}