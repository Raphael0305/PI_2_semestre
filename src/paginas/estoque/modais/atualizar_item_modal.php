<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
             
        .atualizar_item_modal {
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

        .atualizar_item_modal.open_atualizar_modal {
            display: flex; 
        }               

        .modal-dialog {
            max-width: 600px; 
        }
        
        .modal-body {
            max-height: 650px;
        }
        
        .modal-body .mb-2 {
            margin-bottom: 1rem; 
        }
  
        #atualizar_item_modal .modal-content {
            background-color: #e9f7e9; 
            border: 2px solid #4CAF50; 
            border-radius: 8px; 
        }
        .modal-header {
            background-color: #4CAF50; 
            color: white;
            border-bottom: 2px solid #388E3C;
        }

        .btn-close {
            color: white;
        }

        .btn-success {
            background-color: #4CAF50; 
            border-color: #388E3C; 
        }

        .btn-success:hover {
            background-color: #388E3C; 
        }

        .btn-secondary {
            background-color: #A5D6A7; 
            border-color: #81C784; 
        }

        .btn-secondary:hover {
            background-color: #81C784; 
        }

        .form-label {
            color: #388E3C; 
        }

        .form-select, .form-control {
            border-color: #4CAF50; 
        }

        .form-select:focus, .form-control:focus {
            border-color: #388E3C; 
        }
    </style>
</head>

<body>
    <div id="atualizar_item_modal" class="atualizar_item_modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="atualizarItemModalLabel">Atualizar Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar" onclick="closeAtualizarModal()"></button>
                </div>
                <div class="modal-body">
                    <div class="select_item mb-3">
                        <label for="item_selector">Selecione um Item</label>
                        <select name="item_selector" id="item_selector" class="form-select" style="cursor: pointer;">
                            <option value="">Selecione um item</option>
                        </select>
                    </div>

                    <div class="fields mt-3">
                        <div class="left_field">
                            <div class="mb-2">
                                <label for="nome_item" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="atualiza_nome" name="nome" placeholder="Nome do Produto" writingsuggestions="true">
                            </div>
                            <div class="mb-2">
                                <label for="categoria_item" class="form-label">Categoria</label>
                                <select class="form-select" id="atualiza_categoria_item" name="categoria" style="cursor: pointer;" writingsuggestions="true">
                                    <option value="">Categoria</option>
                                    <option value="proteina">Proteína</option>
                                    <option value="carboidrato">Carboidrato</option>
                                    <option value="vegetal">Vegetal</option>
                                    <option value="outros">Outros</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="fornecedor_item" class="form-label">Fornecedor</label>
                                <input type="text" class="form-control" id="fornecedor_item" name="fornecedor" placeholder="Fornecedor" writingsuggestions="true">
                            </div>
                        </div>

                        <div class="right_field">
                            <div class="mb-2">
                                <label for="quantidade_item" class="form-label">Quantidade</label>
                                <input type="text" class="form-control" id="quantidade_item" name="quantidade" placeholder="Quantidade" writingsuggestions="true">
                            </div>
                            <div class="mb-2">
                                <label for="valorUn_item" class="form-label">Valor Unitário</label>
                                <input type="text" class="form-control" id="valorUn_item" name="valorUn" placeholder="Valor Unitário" writingsuggestions="true">
                            </div>
                            <div class="mb-2">
                                <label for="data_validade_item" class="form-label">Data de Validade</label>
                                <input type="date" class="form-control" id="data_validade_item" name="data_validade" writingsuggestions="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeAtualizarModal()">Fechar</button>
                    <button type="button" class="btn btn-success" onclick="atualizarItemDatabase()">Atualizar</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
