<?php

class Pedido{
    private $pdo;

    public function __construct($dbname, $host, $user, $senha) {
        try {
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
        } catch (PDOException $e) {
            echo "Erro com o banco de dados:".$e->getMessage();
            exit();
        }
    }

    public function buscarDados(){
        $res = array();
        $cmd = $this->pdo->query("SELECT 
                id_pedido, 
                Nome_Marmita, 
                Nome_Cliente, 
                quantidade, 
                DATE_FORMAT(dataEntrega, '%d/%m/%Y %H:%i') AS dataEntregaFormatada 
            FROM 
                pedidos 
            ORDER BY 
                dataEntrega DESC");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function cadastrarPedido($marmita, $nome,$qtde,$data){
        $cmd = $this->pdo->prepare("INSERT INTO pedidos (Nome_Marmita, Nome_Cliente, quantidade, dataEntrega) VALUES (:m, :n, :q, :d)");
        $cmd->bindValue(":m", $marmita);
        $cmd->bindValue(":n", $nome);
        $cmd->bindValue(":q", $qtde);
        $cmd->bindValue(":d", $data);
        $cmd->execute();
        header("Location: pedido.php"); 
        return true;
    }

}

?>