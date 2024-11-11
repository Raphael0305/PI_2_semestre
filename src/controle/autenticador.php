<?php
require_once __DIR__ . '/query.php';

class Autenticador{
    private $query;

    public function __construct(){
        $this->query = NEW Query;
    }


    public function logarUsuario($email,$senha){

       $dados = $this->query->buscarLogin($email,$senha); 
         session_start();
        if($dados){
            if($dados['nivel_acesso'] ==  1){
                $_SESSION['id_mestre'] = $dados['id_usuario'];
            }else{
                $_SESSION['id_usuario'] = $dados['id_usuario'];
            }
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