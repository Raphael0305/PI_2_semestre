<?php
require_once __DIR__ . "/autenticador.php";
require_once __DIR__ . "/query.php";


class Estoque{

    private $aute;
    private $query;
    private $pagina;
    private $limite = 5;
    private $pesquisa;
    

    public function __construct()
    {
        $this->aute = NEW Autenticador;
        $this->query = NEW Query;
    }

// ----------------------------------------------------------    INICIO SET DE VARIAVEIS  ----------------------------------------------

    public function setPesquisa($pesq){
        $this->pesquisa = $pesq;
    }

    public function setPagina($pag){
        $this->pagina = $pag;
    }

    public function setLimite($limit){
        $this->limite = $limit;
    }

// ----------------------------------------------------------    FIM SET DE VARIAVEIS  ----------------------------------------------


    public function verifLogin(){
        $this->aute->autenticarUsuario();
    }

    public function todosIngredientes(){
        $consul = $this->query->buscarTodosIngredientes($this->pagina,$this->limite);
        return $consul;
    }
    public function pesquisaIngredientes(){
        $consul = $this->query->buscarIngredientesPesquisa($this->pesquisa);
        return $consul;
    }

    public function ExcluirIngred(){

    }

    public function AdicionarIngred(){
        
    }

}




?>