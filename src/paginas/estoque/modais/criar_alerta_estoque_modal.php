<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Alerta de Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .criar_alerta_modal {
            display: none;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1050;
            overflow: hidden;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .criar_alerta_modal.open_criar_alerta_modal {
            display: flex;
        }

        .modal-dialog {
            max-width: 500px;
            width: 100%;
            margin: 0;
        }

        .modal-content {
            background-color: #e9f7e9;
            border: 2px solid #4CAF50;
            border-radius: 8px;
        }

        .modal-header {
            background-color: #4CAF50;
            color: white;
            border-bottom: 2px solid #388E3C;
            padding: 1rem;
        }

        .modal-body {
            padding: 1rem;
        }

        .form-label {
            color: #388E3C;
        }

        .form-select {
            border-color: #4CAF50;
        }

        .form-select:focus {
            border-color: #388E3C;
        }

        .modal-footer {
            display: flex;
            justify-content: space-between;
            padding: 1rem;
        }

        .btn-close, .btn-success, .btn-secondary {
            background-color: #4CAF50;
            border-color: #388E3C;
            color: white;
        }

        .btn-close {
            color: white;
        }

        .btn-success:hover, .btn-secondary:hover {
            background-color: #388E3C;
        }

        .btn-secondary {
            background-color: #A5D6A7;
            border-color: #81C784;
        }

        .btn-secondary:hover {
            background-color: #81C784;
        }

        .criar_alerta_modal .options {
            margin-bottom: 1rem;
        }

        .criar_alerta_modal select {
            width: 100%;
        }

        body {
            overflow: hidden;
            margin: 0;
        }
    </style>
</head>

<body>
    <div id="criar_alerta_baixo_nivel" class="criar_alerta_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="excluirItemModalLabel">Criar Alerta de Baixo Nível</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar" onclick="closeCriarAlertaModal()"></button>
                </div>
                <div class="modal-body">
                    <div class="options">
                        <label for="alerta_selector" class="form-label">Selecione um Item</label><br>
                        <select name="alerta_selector" id="criar_alerta_selector" class="form-select">
                            <option value="">Selecione um item</option>
                           
                        </select>
                    </div>
                    <div>
                        <label for="quantMinima" class="form-label">Quantidade Mínima</label><br>
                        <input type="text" name="quantMinima" id="quantMinima" class="form-control" placeholder="Quantidade Mínima">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeCriarAlertaModal()">Fechar</button>
                    <button type="button" class="btn btn-success" onclick="criarAlertaBtn()">Criar Alerta</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
