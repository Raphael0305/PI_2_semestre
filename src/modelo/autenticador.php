<?php
include_once '../modelo/query.php';
include_once '../modelo/usuario.php';

class Autenticador{
    private $query;

    public function __construct(){
        $this->query = NEW Query;
    }


    public function logarUsuario(Usuario $user){

       $usuarioLogado = $user->buscarLogin($user->getEmail(),$user->getSenha()); 
       $userData = $user->buscarDadosUsuario();
       if($usuarioLogado){
            session_start();
            $userData = $user->buscarDadosUsuario();

            $_SESSION['userName'] = $userData['nome'];
            $_SESSION['userSobrenome'] = $userData['sobrenome'];
            $_SESSION['userEmail'] = $userData['email'];
            $_SESSION['userNivelAcesso'] = $userData['nivel_acesso'];
            $_SESSION['isLogged'] = true;

            return true;
        }
        return false;
    }

    public function deslogar(){
        session_unset(); 
        session_destroy();
    }

    public function autenticarUsuario(){
        if(isset($_SESSION['id_mestre']) or isset($_SESSION['id_usuario'])){
            return true;
        }else{
            return false;
        }
    }

}
?>