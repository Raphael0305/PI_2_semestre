<?php
 require_once '/xampp/htdocs/MarmitariaProj/classes/classe-conexao.php';
 
class Pedido {
    private $conectar;
 
    public function __construct(ConexaoBanco $conexao)  {
        $this->conectar = $conexao->getConexao();
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

    public function buscarDadosPessoa($id){
        $cmd = $this->conectar->prepare("SELECT * FROM pedidos WHERE id_pedido = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
//************************************************************************************************************************************************************* */ 
    public function EditarPedido($id, $nomeMarmita, $nomeCliente,$qtde,$data){
        $cmd = $this->conectar->prepare("UPDATE pedidos SET Nome_Marmita = :m, 
                                        Nome_Cliente = :c,
                                        quantidade = :q, dataEntrega = :d
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