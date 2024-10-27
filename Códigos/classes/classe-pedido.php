<?php
 require_once '/xampp/htdocs/MarmitariaProj/classes/classe-conexao.php';
 
class Pedido extends ConexaoBanco{
    private $conectar;
 
    public function __construct($conexaoLogin)  {
        $this->conectar = $conexaoLogin;
    }
//************************************************************************************************************************************************************* */ 
    public function buscarDados($pagina, $limite) {
        $inicio = ($pagina * $limite) - $limite;

        $res = array();    
        $cmd = $this->conectar->prepare("
            SELECT id_pedido, Nome_Marmita, Nome_Cliente, quantidade, 
                   DATE_FORMAT(dataEntrega, '%d/%m/%Y %H:%i') AS dataEntregaFormatada 
            FROM pedidos 
            ORDER BY dataEntrega ASC
            LIMIT :inicio, :limite
        ");
        
        $cmd->bindParam(':inicio', $inicio, PDO::PARAM_INT);
        $cmd->bindParam(':limite', $limite, PDO::PARAM_INT);
        
        $cmd->execute();
        
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
//************************************************************************************************************************************************************* */ 
    public function cadastrarPedido($marmita, $nome,$qtde,$data){
        $cmd = $this->conectar->prepare("INSERT INTO pedidos (Nome_Marmita, Nome_Cliente, quantidade, dataEntrega) VALUES (:m, :n, :q, :d)");
        $cmd->bindValue(":m", $marmita);
        $cmd->bindValue(":n", $nome);
        $cmd->bindValue(":q", $qtde);
        $cmd->bindValue(":d", $data);
        $cmd->execute();
        header("Location: pedido.php"); 
        return true;
    }
//************************************************************************************************************************************************************* */ 
    public function EditarPedid(){

    }
//************************************************************************************************************************************************************* */ 
    public function excluirPessoa ($id){
        $cmd = $this->conectar->prepare("DELETE FROM pedidos WHERE id_pedido = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
    }
//************************************************************************************************************************************************************* */ 
    public function totalPaginas($limite){
        $registros = $this->conectar->query("SELECT COUNT(*) FROM pedidos")->fetchColumn();
        $quantPaginas = ceil($registros / $limite);
        return $quantPaginas;       
    }


}

?>