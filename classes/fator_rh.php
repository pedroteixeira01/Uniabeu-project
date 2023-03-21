<?php

/* ----------------------------------------------
  Smart Web Developer - SWD 2.0
  Criado em 04/11/2011
  Autor:Vinícius Marques da Silva Ferreira
  Contato:profvmarques@gmail.com
  Projeto:cdcdia  Criado em:10/01/2022
  ---------------------------------------------- */
require_once('acesso.php');


class FatorRH {

//Atributos da classe
    private $idfator_rh;
    private $descricao;

    //Insert
    public function incluir($descricao) {
        try {
            
            $sql = 'insert into fator_rh(descricao) values( :descricao);';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':descricao', $descricao);
            $stmt->execute();
            $pdo = null;
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela fator_rh = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            $stmt->rollBack();
        }
    }

    //excluir
    public function excluir($idfator_rh) {
        try {
            $sql = 'delete from fator_rh where idfator_rh= :idfator_rh';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idfator_rh', $idfator_rh);

            $stmt->execute();
            $pdo = null;
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela fator_rh = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            $stmt->rollBack();
        }
    }

    //Editar
    public function alterar($idfator_rh, $descricao) {
        try {
            $sql = 'update fator_rh set idfator_rh=:idfator_rh,descricao=:descricao where idfator_rh= :idfator_rh';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idfator_rh', $idfator_rh);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->execute();
            $pdo = null;
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela fator_rh = ' . $sql . '</b> <br /><br />' . $e->getMessage();
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