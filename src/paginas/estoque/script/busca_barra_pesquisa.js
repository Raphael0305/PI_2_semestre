document.addEventListener('DOMContentLoaded', (e)=>{

    let buscar_item = document.getElementById('buscar_item')
    buscar_item.addEventListener('keyup',  async (e) =>{
        console.log(e.target.value)
        const response = await fetch("../../../controle/buscar_item_por_nome.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
    
            },
            body: JSON.stringify({
                nome: e.target.value
            })

            
        })
        item = await response.json()
        console.log(item)
        showItemsAtTable(item['item'])
    })

    async function showItemsAtTable(items){
        console.log(items)
        let table = getElementByID("table")
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

})

