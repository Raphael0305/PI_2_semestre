
async function criarAlertaBtn(){
        const excluir_alerta = document.getElementById('criar_alerta_selector')
        const criar_alerta_modal = document.getElementById('crir_alerta_baixo_nivel')
        const quantMin_item = document.getElementById('quantMinima')
        path_get_item = `../../../../../controle/buscar_item_id.php`
        path_criar_alerta = `../../../../../controle/criar_alerta.php`

        const buscas = new Request()
        const item = await buscas.getItemById(excluir_alerta.value, path_get_item)
        const alertaCriadoComSucesso = await buscas.criarAlerta(item['item'], quantMin_item.value, path_criar_alerta)
        console.log(alertaCriadoComSucesso)
        if(alertaCriadoComSucesso){

            criar_alerta_modal.classList.remove('openCriarAlertaModel')
        }
        showItemsAtTable()
        quantMin_item.value = ''
        




}

class Request {
    constructor() {
    }

    async getItemById(id, path){
        const response = await  fetch(path, {
            method: "POST",
            headers: {
                "Content": "application/json"
            },
            body: JSON.stringify({
                ID_ingrediente: id
            })
        }
        )
        const item = await response.json()
        return item
    }

    async criarAlerta(item, quantMinima, path){
        const jsonm = JSON.stringify({
            ID_ingrediente: item['ID_ingrediente'],
            quantidade_estoque: item['quantidade'],
            quantMin: quantMinima,
        }) 
        const response = await fetch(path, {
            method: "POST",
            headers: {
                "Content-Type": "application/json" 
            },
            body: jsonm
        });

        const alertaCriado = await response.json()

        return alertaCriado['status']
        
    }

}

async function showItemsAtTable(){
    let table = getElementByID("table_body_display")
    let items = await getItems()
    console.log("abri")
    table.querySelector("tbody").innerHTML = `<tr></tr>`
    items.forEach(element =>{
        table.querySelector("tbody").innerHTML += `<tr style="text-align:center;">
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