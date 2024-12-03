<?php

include_once __DIR__ . '/classe-conexao.php';

class Query
{
    public $conectar;
    // ----------------------------------------------------------------------------------------------------------------------------------------
    public function __construct()
    {
        $conexao = new ConexaoBanco();
        $this->conectar = $conexao->getConexao();
    }

    public function beginTransaction()
    {
        return $this->conectar->beginTransaction();
    }

    public function commit()
    {
        return $this->conectar->commit();
    }

    public function rollBack()
    {
        return $this->conectar->rollBack();
    }

    public function cadastrarMarmitaComProcedure($nomeMarmita, $precoMarmita, $ingredientes)
    {
        try {

            $this->conectar->beginTransaction();

            $sql = "CALL addMarmita(:nomeMarmita, :preco, :qtdeMarmita1, :qtdeMarmita2, :qtdeMarmita3, :P_IDingred1, :P_IDingred2, :P_IDingred3)";
            $query = $this->conectar->prepare($sql);

            $query->bindParam(':nomeMarmita', $nomeMarmita);
            $query->bindParam(':preco', $precoMarmita);

            $query->bindParam(':qtdeMarmita1', $ingredientes[0]['quantidade']);
            $query->bindParam(':qtdeMarmita2', $ingredientes[1]['quantidade']);
            $query->bindParam(':qtdeMarmita3', $ingredientes[2]['quantidade']);

            $query->bindParam(':P_IDingred1', $ingredientes[0]['id']);
            $query->bindParam(':P_IDingred2', $ingredientes[1]['id']);
            $query->bindParam(':P_IDingred3', $ingredientes[2]['id']);


            $query->execute();


            $this->conectar->commit();
        } catch (Exception $e) {

            $this->conectar->rollback();
            throw new Exception("Erro ao cadastrar marmita: " . $e->getMessage());
        }
    }

    public function cadastrarUsuarioProcedure($nome, $email, $senha, $telefone, $nivelAcesso): bool
    {

        $query = "call addUsuario(:Nomecliente, :Email, :Senha, :Telefone, :nivelAcessso)";

        $stmt = $this->conectar->prepare($query);

        $stmt->bindValue(":Nomecliente", $nome);
        $stmt->bindValue(":Email", $email);
        $stmt->bindValue(":Senha", $senha);
        $stmt->bindValue(":Telefone", $telefone);
        $stmt->bindValue(":nivelAcessso", $nivelAcesso);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao cadastrar item: " . $e->getMessage();
            return false;
        }
    }
}
