<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="excluir_item_modal" class="excluir_item_modal">
        <div class="exluir_modal">
            <div class="header">
                <h5>Excluir Item</h5>
            </div>
            <div class="content">
                <div class="options">
                    <label for="item_selector">Selecione um Item</label><br>
                    <select name="item_selector" id="excluir_item_selector">
                        <option value="">Selecione um item</option>
                    </select>
                </div>
            </div>
            <div class="footer">
                <div class="fechar">
                    <button onclick="closeEcluirModal()">Fechar</button>
                </div>
                <div class="excluir">
                    <button onclick="exluirItem()">Excluir</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>