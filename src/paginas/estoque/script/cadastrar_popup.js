function openPopup(){
    const modal = document.getElementById("cadastrar_item_modal")
    modal.classList.add("open_cadastrar_modal")
}

function closeModal(){
    let modal = getElementByID("cadastrar_item_modal")
    modal.classList.remove("open_cadastrar_modal")

    clearInputs()
    showItemsAtTable()
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
        console.log('registrado cachorro')
        closeModal()
    }

}



function getInputsName(){
    let nome = document.getElementById("nome_item");
    let categoria = document.getElementById("categoria");
    let fornecedor = document.getElementById("fornecedor");
    let quantidade = document.getElementById("quantidade");
    let valorUn = document.getElementById("valorUn");
    let data_validade = document.getElementById("data_validade");
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
    let nome = getElementByID("nome_item")
    nome.value = null
    let categoria = getElementByID("categoria")
    categoria.value = ""
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