<?php
session_start();
require_once 'classes\classe-login.php';
$login = new Login('marmitaria', 'localhost', 'root', '');
$login->verifLogin();
var_dump($_SESSION);


if (isset($_POST['logout'])) {
    $login->logout();  
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <button type="submit" name="logout">SAIR</button>
    </form>
</body>

</html>