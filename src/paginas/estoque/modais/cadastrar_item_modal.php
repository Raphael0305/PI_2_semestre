<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Ingrediente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .modal-dialog {
            max-width: 600px;
            margin: 30px auto;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-content {
            background-color: #f7f9f7;
            border-radius: 8px;
            border: 2px solid #4CAF50;
        }

        .modal-header {
            background-color: #4CAF50;
            color: white;
            border-bottom: 2px solid #388E3C;
            padding: 20px;
        }

        .modal-title {
            font-size: 1.5rem;
        }

        .btn-close {
            color: white;
        }

        .form-label {
            color: #388E3C;
        }

        .form-select,
        .form-control {
            border-radius: 5px;
            border: 1px solid #4CAF50;
            padding: 10px;
        }

        .form-select:focus,
        .form-control:focus {
            border-color: #388E3C;
        }

        .mb-2 {
            margin-bottom: 1rem;
        }

        .btn-secondary,
        .btn-success {
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-secondary {
            background-color: #A5D6A7;
            border-color: #81C784;
        }

        .btn-secondary:hover {
            background-color: #81C784;
        }

        .btn-success {
            background-color: #4CAF50;
            border-color: #388E3C;
        }

        .btn-success:hover {
            background-color: #388E3C;
        }

        .footer-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div id="cadastrar_item_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadastrarItemModalLabel">Cadastrar Ingrediente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="my_form">
                        <div class="mb-2">
                            <label for="nome_item" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome_item" name="nome" placeholder="Nome do Ingrediente" required>
                        </div>

                        <div class="mb-2">
                            <label for="categoria_item" class="form-label">Categoria</label>
                            <select class="form-select" id="categoria" name="categoria" required>
                                <option value="">Selecione a Categoria</option>
                                <option value="proteina">Proteína</option>
                                <option value="carboidrato">Carboidrato</option>
                                <option value="vegetal">Vegetal</option>
                                <option value="outros">Outros</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="fornecedor_item" class="form-label">Fornecedor</label>
                            <input type="text" class="form-control" id="fornecedor" name="fornecedor" placeholder="Fornecedor" required>
                        </div>

                        <div class="mb-2">
                            <label for="quantidade_item" class="form-label">Quantidade</label>
                            <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade" required>
                        </div>

                        <div class="mb-2">
                            <label for="valorUn_item" class="form-label">Valor Unitário</label>
                            <input type="number" class="form-control" id="valorUn" name="valorUn" placeholder="Valor Unitário" required>
                        </div>

                        <div class="mb-2">
                            <label for="data_validade_item" class="form-label">Data de Validade</label>
                            <input type="date" class="form-control" id="data_validade" name="data_validade" required>
                        </div>
                    </form>
                </div>

                <div class="modal-footer footer-buttons">
                    <button type="button" class="btn btn-secondary" onclick="closeModal()">Fechar</button>
                    <button type="button" class="btn btn-success" onclick="cadastraItem()">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
