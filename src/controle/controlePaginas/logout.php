<?php
require_once __DIR__ . '/../autenticador.php';
$aute = NEW Autenticador;

$aute->deslogar();
header("Location: ../../index.php");
exit();
?>