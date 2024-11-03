<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="paginas/login/css/style.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Marmitaria Fit</title>
</head>

<body>
    <div class="wrapper">
        <form action="controle/login_controle.php" method="POST" class="d-flex flex-column bd-highlight" style="width: 80%;">
            <div class="mb-3 welcome">
                <h1>Seja bem Vindo!!</h1>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Digite seu E-mail">
                <ul class="email_error">
                    <li id="email_error_display"> </li>
                </ul>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Digite sua Senha">
                <ul class="passwd_error">
                    <li id="password_error_display"></li>
                </ul>
            </div>
            <button id="entrarBtn" style="margin-top: 15px;" type="submit" class="btn btn-success" disabled>Entrar</button>
        </form>
    </div>
</body>
<script src="paginas/login/scripts/login_validation.js"></script>
</html>