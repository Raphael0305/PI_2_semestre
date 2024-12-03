function openAtualizarModal(){
    let modal = getElementByID("atualizar_item_modal")

    modal.classList.add("open_atualizar_modal")
    atualizarSelector()
}

function closeAtualizarModal(){
    let modal = getElementByID("atualizar_item_modal")
    
    modal.classList.remove("open_atualizar_modal")
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


async function atualizarSelector(){
    let items = await getItems()
    let selector = getElementByID("item_selector")
    selector.innerHTML = `<option value="">Selecione um item</option>`
    
    items.forEach(element => {
        selector.innerHTML += `<option value="${element['ID_ingrediente']}">${element['nome']}</option>`
    });

}

async function atualizarItemDatabase(){
    let selector = getElementByID("item_selector")
    let itemFromDb = await getItemById(selector.value)
    let db = itemFromDb['item']
    let itemFromInput = getInputValues()
    let updateFields = {}
    console.log(itemFromInput)
    for (let key in db) {
        if(db[key] !== itemFromInput[key]){
            
            updateFields[key] = itemFromInput[key]
        }
        if(key === "ID_ingrediente"){
            console.log(db[key])
            updateFields[key] = db[key]
        }
    }
    let response = await fetch("../../../controle/atualiza_item.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(updateFields)
    })
    limpaCampos()
    closeAtualizarModal()
    showItemsAtTable()
}


function getElementByID(elementId){
    return document.getElementById(elementId)
}

async function getItemById(id){
    const response = await fetch("../../../controle/buscar_item_id.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            ID_ingrediente: id
        })
    })
    return await response.json()

}

function preencheCampos(item) {
    let nome = document.getElementById("atualiza_nome");
    let categoria = document.getElementById("atualiza_categoria_item");
    let fornecedor = document.getElementById("fornecedor_item");
    let quantidade = document.getElementById("quantidade_item");
    let valorUn = document.getElementById("valorUn_item");
    let data_validade = document.getElementById("data_validade_item");

    nome.value = item['nome'];
    categoria.value = item['categoria'];
    fornecedor.value = item['fornecedor'];
    quantidade.value = item['quantidade'];
    valorUn.value = item['valorUn'];
    data_validade.value = item['data_validade'];
}



function limpaCampos(){
    let nome = getElementByID("atualiza_nome")
    let categoria = getElementByID("atualiza_categoria_item")
    let fornecedor = getElementByID("fornecedor_item")
    let quantidade = getElementByID("quantidade_item")
    let valorUn = getElementByID("valorUn_item")
    let data_validade = getElementByID("data_validade_item")
    let quantMin_item = getElementByID("quantMin_item")
    nome.value = ""
    categoria.value = ""
    fornecedor.value = ""
    quantidade.value = ""
    valorUn.value = ""
    data_validade.value = ""
}

let selector = getElementByID("item_selector")

selector.addEventListener("change", async (event) => {
    let itemId = event.target.value
    let item = await getItemById(itemId)
    preencheCampos(item['item'])
})

document.addEventListener("keyup", (event) => {
    if (event.key === "Escape") {
        closeAtualizarModal();
    }
});

function getInputValues(){
    let nome = getElementByID("atualiza_nome")
    let categoria = getElementByID("atualiza_categoria_item")
    let fornecedor = getElementByID("fornecedor_item")
    let quantidade = getElementByID("quantidade_item")
    let valorUn = getElementByID("valorUn_item")
    let data_validade = getElementByID("data_validade_item")
    return {
        nome: nome.value,
        categoria: categoria.value,
        fornecedor: fornecedor.value,
        quantidade: quantidade.value,
        valorUn: valorUn.value,
        data_validade: data_validade.value,
}
}


async function showItemsAtTable(){
    let table = getElementByID("table")
    let items = await getItems()
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