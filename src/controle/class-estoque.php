<?php
require_once __DIR__ . "/autenticador.php";
require_once __DIR__ . "/query.php";


class Estoque{

    private $aute;
    private $query;
    private $pagina;
    private $limite = 5;
    

    public function __construct()
    {
        $this->aute = NEW Autenticador;
        $this->query = NEW Query;
    }


// ----------------------------------------------------------    FIM SET DE VARIAVEIS  ----------------------------------------------

// AUTENTICADOR ----- 
    public function EstoqueVerifLogin(){
        $this->aute->autenticarUsuario();
    }

    public function EstoqueDeslgoar(){
        $this->aute->deslogar();
    }
// FIM AUTENTICADOR


// INICIO QUERY 

    public function EstoqueTodosIngredientes(){
        $consul = $this->query->buscarTodosIngredientes();
        return $consul;
    }
    public function EstoqueIngredientesPesquisa($pesquisa){
        $consul = $this->query->buscarIngredientesPesquisa($pesquisa);
        return $consul;
    }

    public function EstoqueExcluirIngred(){

    }

    public function EstoqueAdicionarIngred(){
        
    }

    public function EstoqueEstoqueCadastrarIngredi(){

    }



}




?>