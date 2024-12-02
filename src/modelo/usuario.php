<?php
include_once __DIR__ . '/../modelo/classe-conexao.php';
include_once __DIR__ . '/../uteis/manipulador_password.php';
include_once __DIR__ . '/../uteis/nivel_acesso.php';


class Usuario
{

    private $conn;
    private string $nome;
    private NivelAcesso $nivel_acesso;
    private string $email;
    private string $senha;
    private DateTime $data_cadastro;

    public function __construct($email, $nome, $nivel_acesso, $senha, $data_cadastro)
    {
        $this->setEmail($email);
        $this->setNome($nome);
        $this->nivel_acesso = $nivel_acesso;
        $this->setSenha($senha);
        $this->data_cadastro = $data_cadastro;
        $database = new ConexaoBanco();
        $this->conn = $database->getConexao();
    }

    static public function factoryUsuario(String $email, String $senha): Usuario
    {
        return new Usuario(
            email: $email,
            nome: 'nome_placeholder',
            nivel_acesso: NivelAcesso::FUNCIONARIO,
            senha: $senha,
            data_cadastro: new DateTime('now', new DateTimeZone('America/Sao_Paulo'))
        );
    }

    // ----------------------------------------------------------------------------------------------------------------------------------------
    public function buscarLogin(): bool
    {
        $email = $this->email;
        $senha = $this->senha;
        $query = "SELECT * FROM usuario WHERE email = '{$email}'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $response = $stmt->fetch(PDO::FETCH_ASSOC);
            $passwd_hash = $response["senha"];
            return ManipuladorPassword::verify_password($senha, $passwd_hash);
        }
        return false;
    }

    public function buscarDadosUsuario()
    {
        $email = $this->email;
        $query = $this->conn->prepare("SELECT * FROM usuario WHERE email = '{$email}'");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarUsuarioPorEmail()
    {
        $email = $this->email;
        $query = $this->conn->prepare("SELECT * FROM usuarios WHERE email = {$email}");
        $query->execute();

        if ($query->rowCount() > 0) {
            return $query->fetch();
        } else {
            return false;
        }
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setNivelAcesso($nivel_acesso)
    {
        $this->nivel_acesso = $nivel_acesso;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getNivelAcesso()
    {
        return $this->nivel_acesso;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }
}
