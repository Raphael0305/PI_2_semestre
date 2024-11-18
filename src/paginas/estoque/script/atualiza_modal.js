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
    const response = await fetch("../../../controle/buscar_items.php", {
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
        selector.innerHTML += `<option value="${element['id_ingrediente']}">${element['nome']}</option>`
    });

}

async function atualizarItemDatabase(){
    let selector = getElementByID("item_selector")
    let itemFromDb = await getItem(selector.value)
    let db = itemFromDb['item']
    let itemFromInput = getInputValues()
    let updateFields = {}

    for (let key in db) {
        if(db[key] !== itemFromInput[key]){
            
            updateFields[key] = itemFromInput[key]
        }
        if(key === "id_ingrediente"){
            console.log(db[key])
            updateFields[key] = db[key]
        }
    }
    console.log(updateFields)
    let response = await fetch("../../../controle/atualiza_item.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(updateFields)
    })
    limpaCampos()
    closeAtualizarModal()

}


function getElementByID(elementId){
    return document.getElementById(elementId)
}

async function getItem(id){
    const response = await fetch("../../../controle/buscar_item_id.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            id_ingrediente: id
        })
    })
    return await response.json()
    

}

function preencheCampos(item){
    let nome = getElementByID("nome_item")
    let categoria = getElementByID("categoria_item")
    let fornecedor = getElementByID("fornecedor_item")
    let quantidade = getElementByID("quantidade_item")
    let valorUn = getElementByID("valorUn_item")
    let data_validade = getElementByID("data_validade_item")
    nome.value = item['nome']
    categoria.value = item['categoria']
    fornecedor.value = item['fornecedor']
    quantidade.value = item['quantidade']
    valorUn.value = item['valorUn']
    data_validade.value = item['data_validade']
}


function limpaCampos(){
    let nome = getElementByID("nome_item")
    let categoria = getElementByID("categoria_item")
    let fornecedor = getElementByID("fornecedor_item")
    let quantidade = getElementByID("quantidade_item")
    let valorUn = getElementByID("valorUn_item")
    let data_validade = getElementByID("data_validade_item")
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
    let item = await getItem(itemId)
    preencheCampos(item['item'])

})

function getInputValues(){
    let nome = getElementByID("nome_item")
    let categoria = getElementByID("categoria_item")
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
        data_validade: data_validade.value
}
}