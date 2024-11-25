<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="crir_alerta_baixo_nivel" class="criar_alerta">
        <div class="criar_alerta_modal">
            <div class="header">
                <h5>Excluir Item</h5>
            </div>
            <div class="content">
                <div class="options">
                    <label for="alerta_selector">Selecione um Item</label><br>
                    <select name="alerta_selector" id="excluir_alerta_selector">
                        <option value="">Selecione um item</option>
                    </select>
                </div>
            </div>
            <div class="footer">
                <div class="fechar">
                    <button onclick="closeCriarAlertaModal()">Fechar</button>
                </div>
                <div class="excluir">
                    <button onclick="criarAlerta()">Excluir</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>