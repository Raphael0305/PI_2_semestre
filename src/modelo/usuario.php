<?php
include_once 'query.php';

class Usuario{

    private $conn;
    private string $nome = '';
    private string $sobrenome = '';
    private int $nivel_acesso = 1;
    private string $email;
    private string $senha = '';
    private DateTime $data_cadastro;

    public function __construct($email, $nome = '', $sobrenome = '', $nivel_acesso = 1, $senha = '', $data_cadastro = null) {
        $this->setEmail($email);
        $this->setNome($nome);
        $this->setSobrenome($sobrenome);
        $this->setNivelAcesso($nivel_acesso);
        $this->setSenha($senha);
        $this->setDataCadastro($data_cadastro ?? '');
        $database = new ConexaoBanco();
        $this->conn = $database->getConexao();

    }

    // ----------------------------------------------------------------------------------------------------------------------------------------
    public function buscarLogin($email, $senha): bool{
        $query = "SELECT * FROM usuarios WHERE email = :e";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":e", $email);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            $response = $stmt->fetch(PDO::FETCH_ASSOC);
            $passwd_hash = $response["senha"];
            return ManipuladorPassword::verify_password($senha, $passwd_hash);
            }
        return false;
        
    }

    public function buscarDadosUsuario(){
        $query = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :email");
        $query->bindValue(":email",$this->email);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarUsuarioPorEmail() {
        $query = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :e");
        $query->bindValue(":e", $this->email);
        $query->execute();
    
        if ($query->rowCount() > 0) {
            return $query->fetch();
        } else {
            return false; 
        }
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setSobrenome($sobrenome){
        $this->sobrenome = $sobrenome;
    }

    public function setNivelAcesso($nivel_acesso){
        $this->nivel_acesso = $nivel_acesso;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

     public function setDataCadastro($data_cadastro){
        if(!empty($data_cadastro)){
            $date = DateTime::createFromFormat("Y-m-d", $data_cadastro);
            if($date !== false){
                $this->data_cadastro = $date;
            }
        }
    }

    public function getNome(){
        return $this->nome;
    }

    public function getSobrenome(){
        return $this->sobrenome;
    }

    public function getNivelAcesso(){
        return $this->nivel_acesso;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function getDataCadastro(){
        return $this->data_cadastro;
    }

    public function validarEmail(){

    }
    
    public function validarSenha(){

    }

}


?>