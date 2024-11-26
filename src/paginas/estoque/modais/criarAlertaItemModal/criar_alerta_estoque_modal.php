<!DOCTYPE html>
<html lang="en">

<head></head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Criar Alerta de Estoque</title>
</head>

<body>
    <div id="crir_alerta_baixo_nivel" class="criar_alerta_modal">
        <div class="criar_alerta_modal_body">
            <div class="header">
                <h5>Criar alerta de baixo nivel</h5>
            </div>
            <div class="content">
                <div class="options">
                    <label for="alerta_selector">Selecione um Item</label><br>
                    <select name="alerta_selector" id="criar_alerta_selector">
                        <option value="">Selecione um item</option>
                    </select>
                    <div>
                        <label for="quantMinima">Quantidade Minima</label><br>
                        <input type="text" name="quantMinima" id="quantMinima" placeholder="Quantidade Minima">
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="fechar">
                    <button onclick="closeCriarAlertaModal()">Fechar</button>
                </div>
                <div class="excluir">
                    <button onclick="criarAlertaBtn()">Criar alerta</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>