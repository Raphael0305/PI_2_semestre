<?php
 require_once 'classe-conexao.php';
 
class Pedido {
    private $conectar;
 
    public function __construct()  {
        $conexao = NEW ConexaoBanco;
        $this->conectar = $conexao->getConexao();
    }
//************************************************************************************************************************************************************* */ 
public function buscarDados($pagina, $limite) {
    $inicio = ($pagina * $limite) - $limite;

    $res = array();
    $cmd = $this->conectar->prepare("
        SELECT id_pedido, nome_marmita, nome_cliente, quantidade, 
               DATE_FORMAT(data_entrega, '%d/%m/%Y %H:%i') AS dataEntregaFormatada 
        FROM pedidos 
        ORDER BY data_entrega ASC
        LIMIT $inicio, $limite
    ");
    
    $cmd->execute();
    
    $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}
//************************************************************************************************************************************************************* */ 
    public function cadastrarPedido($marmita, $nome,$qtde,$data){
        $cmd = $this->conectar->prepare("INSERT INTO pedidos (nome_marmita, nome_cliente, quantidade, data_entrega) VALUES (:m, :n, :q, :d)");
        $cmd->bindValue(":m", $marmita);
        $cmd->bindValue(":n", $nome);
        $cmd->bindValue(":q", $qtde);
        $cmd->bindValue(":d", $data);
        $cmd->execute();
        header("Location: pedido.php"); 
        return true;
    }

    public function buscarDadosPessoa($id){
        $cmd = $this->conectar->prepare("SELECT * FROM pedidos WHERE id_pedido = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
//************************************************************************************************************************************************************* */ 
    public function EditarPedido($id, $nomeMarmita, $nomeCliente,$qtde,$data){
        $cmd = $this->conectar->prepare("UPDATE pedidos SET nome_marmita = :m, 
                                        nome_cliente = :c,
                                        quantidade = :q, data_entrega = :d
                                        WHERE id_pedido = :id");
        $cmd->bindValue(":m", $nomeMarmita);
        $cmd->bindValue(":c", $nomeCliente);
        $cmd->bindValue(":q", $qtde);
        $cmd->bindValue(":d", $data);
        $cmd->bindValue(":id", $id);;
        $cmd->execute();
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