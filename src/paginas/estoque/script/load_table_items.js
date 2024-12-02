document.addEventListener("DOMContentLoaded", showItemsAtTable())

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
                                    <td style="text-align:center;">${element['quantMin']}</td>
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