<?php

require_once  __DIR__ .'/classes/classe-login.php';

$login = NEW Login();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Document</title>
</head>

<body>
    
    <section class="fundo">
        <div class="esquerdaLogin">
            <img src="img\eating-a-variety-of-foods-animate.svg" alt="">
        </div>
        <div class="DireitaLogin">
            <div class="estrutura">
                <form action="" method="post">
                    <div class="titulo">
                        <h2>LOGIN</h2>
                    </div>
                    <div class="user">
                        <label for="Usuário">Usuário</label>
                        <input type="text" name="usuario" placeholder="Usuário">
                    </div>
                    <div class="senha">
                        <label for="Senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha">
                    </div>
                    <div class="botao">
                        <button type="submit">ENTRAR</button>
                    </div>

                    <!-- Código PHP -->
                    <?php
                    if (isset($_POST['usuario']) && isset($_POST['senha'])) {
                        $usuario = $_POST['usuario'];
                        $senha = $_POST['senha'];

                        if (!empty($usuario) && !empty($senha)) {
                            if ($login->logar($usuario, $senha)) {
                                header("Location: pedido.php");
                                exit(); 
                            } else {
                                ?>
                                <div class="msgErro">
                                    Usuário ou senha estão incorretos
                                </div>
                                <?php
                            }
                        } else {
                            ?>
                            <div class="msgErro">
                                Preencha todos os campos!
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <!-- FIM CÓDIGO PHP  XD -->
                </form>
            </div>
        </div>
    </section>

</body>

</html>
