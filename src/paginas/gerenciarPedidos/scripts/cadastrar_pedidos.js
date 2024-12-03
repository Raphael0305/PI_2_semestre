async function cadastrarPedido(){
    console.log('clicked')
    let nomeCliente = document.getElementById('nomeCliente')
    let cadastrar_pedido_modal = document.getElementById('cadastrar_pedido_modal')
    console.log(nomeCliente.value)
    let quantidade = document.getElementById('quantidade')
    let idMarmita = document.getElementById('selecionarMarmita')
    let response = await fetch('../../../controle/cadastrar_pedido_controle.php',
        {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify({
                nomeCliente: nomeCliente.value,
                quantidade: quantidade.value,
                id_marmita: idMarmita.value
            })
        },
    )
    let itens = await response.json()
    console.log(itens)
    await mostraList()
    const modal = bootstrap.Modal.getInstance(cadastrar_pedido_modal)
    modal.hide()

}

async function mostraList(){
    let lista = document.getElementById("list-group")
    let response = await fetch('../../../controle/buscar_pedidos_controle.php', {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
    });
    const itens =  await response.json();
    lista.innerHTML = ``
        itens.forEach(element => {
            let item = JSON.parse(element['pedido01'])
            let marmita = item['marmita']
            let ingredientes = marmita['ingredientes']
            
            if(item['completo'] == "não") {
                lista.innerHTML += `<div href="#" class="list-group-item list-group-item-action active list-group-item-success item" aria-current="true">
                    <div class="id-pedido">
                        <div>
                            <h6 style="display: inline;">Pedido: </h6>
                            <p style="display: inline;">${item['ID_pedido']}</p>
                        </div>
                        <div>
                            <h6 style="display: inline;">Nome Cliente: </h6>
                            <p style="display: inline;">${item['nomeCliente']}</p>
                        </div>
                    </div>
                    <div class="produtos">
                        <div style="text-align: center;">
                            <h6 style="display: inline;">Produto: </h6>
                            <p style="display: inline;">${marmita['nomeMarmita']}</p>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <p style="display: inline;">${ingredientes[0]['nome']}</p>
                            <p style="display: inline; padding: 0px 5px;">...............................................................................................</p>
                            <p style="display: inline;">${ingredientes[0]['categoria']}</p>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-top: -20px;">
                            <p style="display: inline;">${ingredientes[1]['nome']}</p>
                            <p style="display: inline; padding: 0px 5px;">...............................................................................................</p>
                            <p style="display: inline;">${ingredientes[1]['categoria']}</p>
                        </div>
                    </div>
                    <div class="produto-btn">
                        <button style="font-size: 0.8em;" onclick="conscluirPedido()" class="btn_delete">Concluir</button>
                        <button onclick="apagarPedido(${item['ID_pedido']})" class="btn_delete"><img src="../../assets/icons/delete.svg" alt="Delete"></button>
                    </div>
                </div>`
               
        }
    });
    let quantidadeItens = lista.childElementCount
    if(quantidadeItens <= 0){
        lista.innerHTML = `<div style="text-align: center; align-content: center;">
                                <h2>Nenhum Pedido.</h2>
                                <p>Nenhum Pedido para preparar ainda.</p>
                            </div>`
    }
}