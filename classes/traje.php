<?php

/* ----------------------------------------------
  Smart Web Developer - SWD 2.0
  Criado em 04/11/2011
  Autor:Vinícius Marques da Silva Ferreira
  Contato:profvmarques@gmail.com
  Projeto:cdcdia  Criado em:10/01/2022
  ---------------------------------------------- */
require_once('acesso.php');
class Traje {

//Atributos da classe
    private $idtraje;
    private $descricao;
    private $idevento;

    //Insert
    public function incluir($descricao, $idevento) {
        try {
            
            $sql = 'insert into traje(descricao,idevento) values( :descricao, :idevento);';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':idevento', $idevento);
            $stmt->execute();
            $pdo = null;
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela traje = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            $stmt->rollBack();
        }
    }

    //excluir
    public function excluir($idtraje) {
        try {
            $sql = 'delete from traje where idtraje= :idtraje';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idtraje', $idtraje);

            $stmt->execute();
            $pdo = null;
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela traje = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            $stmt->rollBack();
        }
    }

    //Editar
    public function alterar($idtraje, $descricao, $idevento) {
        try {
            $sql = 'update traje set idtraje=:idtraje,descricao=:descricao,idevento=:idevento where idtraje= :idtraje';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idtraje', $idtraje);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':idevento', $idevento);
            $stmt->execute();
            $pdo = null;
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela traje = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            $stmt->rollBack();
        }
    }

    public function consultar($sql) {
        $acesso = new Acesso();
        $acesso->conexao();
        $acesso->query($sql);
        $this->Linha = $acesso->linha;
        $this->Result = $acesso->result;
    }

}

?>