async function getItems(){
    const response = await fetch("../../../controle/buscar_itens.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        }
    })
    return await response.json()
}

async function openExcluirModal() {
    const items = await getItems();
    const modal = document.getElementById("excluir_item_modal"); 
    const selector = document.getElementById("excluir_item_selector"); 

    modal.classList.add("open_excluir_modal"); 
    document.body.style.overflow = "hidden";

    selector.innerHTML = `<option value="">Selecione um item</option>`;
    items.forEach((item) => {
        selector.innerHTML += `<option value="${item.ID_ingrediente}">${item.nome}</option>`;
    });
}

function closeEcluirModal() {
    const modal = document.getElementById("excluir_item_modal");
    const selector = document.getElementById("excluir_item_selector");

    modal.classList.remove("open_excluir_modal");
    document.body.style.overflow = "";
    selector.innerHTML = `<option value="">Selecione um item</option>`;
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
    showItemsAtTable()
    closeEcluirModal()
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

document.addEventListener("keyup", (event) => {
    if (event.key === "Escape") {
        closeEcluirModal();
    }
});

function getElementByID(elementId){
    return document.getElementById(elementId)
}

