<?php

require_once __DIR__ . '/classe-conexao.php';
include '../modelo/uteis/manipulador_password.php';

class Query {
    public $conectar;
// ----------------------------------------------------------------------------------------------------------------------------------------
    public function __construct() {
        $conexao = new ConexaoBanco();
        $this->conectar = $conexao->getConexao();
    }
// ----------------------------------------------------------------------------------------------------------------------------------------
    public function buscarUsuarioPorEmail($email) {
        $query = $this->conectar->prepare("SELECT * FROM usuarios WHERE email = :e");
        $query->bindValue(":e", $email);
        $query->execute();
    
        if ($query->rowCount() > 0) {
            return $query->fetch();
        } else {
            return false; 
        }
    }
// ----------------------------------------------------------------------------------------------------------------------------------------
    public function buscarLogin($email, $senha): bool{
        $query = "SELECT * FROM usuarios WHERE email = :e";
        $stmt = $this->conectar->prepare($query);
        $stmt->bindValue(":e", $email);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            $response = $stmt->fetchAll();
            $passwd_hash = $response[0]["senha"];
            return ManipuladorPassword::verify_password($senha, $passwd_hash);
            }
        
    }
    
    
// ----------------------------------------------------------------------------------------------------------------------------------------
    public function buscarDadosUsuario($id){
        $query = $this->conectar->prepare("SELECT * FROM usuarios WHERE id_usuario = :id");
        $query->bindValue(":id",$id);
        $query->execute();
        return $query->fetch();
    }
// ----------------------------------------------------------------------------------------------------------------------------------------
// BUSCAR DE INGREDIENTES**
    public function buscarIngredientesPesquisa($pesquisa){

            $query = $this->conectar->prepare("SELECT * FROM ingredientes WHERE nome LIKE :pesquisa");
            $query->bindValue(':pesquisa', '%' . $pesquisa . '%');         
            $query->execute();
            return $query->fetchAll();
    }

    public function buscarTodosIngredientes($pagina, $limite){
        $query = $this->conectar->prepare("SELECT * FROM ingredientes LIMIT :pagina, :limite");
    
        $query->bindValue(':pagina', $pagina, PDO::PARAM_INT);
        $query->bindValue(':limite', $limite, PDO::PARAM_INT);
        $query->execute();
    
        return $query->fetchAll();
    }

    public function totalPaginas($limite){
        $registros = $this->conectar->query("SELECT COUNT(*) FROM ingredientes")->fetchColumn();
        $quantPaginas = ceil($registros / $limite);
        return $quantPaginas;       
    }
    
// ----------------------------------------------------------------------------------------------------------------------------------------    
    function buscarEstruturaTabela() {
        $query = $this->conectar->query("DESCRIBE ingredientes");
        return $query->fetchAll(PDO::FETCH_ASSOC); // Retorna a estrutura da tabela
    }
}
