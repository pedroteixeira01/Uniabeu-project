<?php

/* ----------------------------------------------
  Smart Web Developer - SWD 2.0
  Criado em 04/11/2011
  Autor:Vinícius Marques da Silva Ferreira
  Contato:profvmarques@gmail.com
  Projeto:cdcdia  Criado em:10/01/2022
  ---------------------------------------------- */
require_once('acesso.php');


class Pais {

//Atributos da classe
    private $idpais;
    private $descricao;

    //Insert
    public function incluir($descricao) {
        try {
            
            $sql = 'insert into pais(descricao) values( :descricao);';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':descricao', $descricao);
            $stmt->execute();
            $pdo = null;
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pais = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            $stmt->rollBack();
        }
    }

    //excluir
    public function excluir($idpais) {
        try {
            $sql = 'delete from pais where idpais= :idpais';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idpais', $idpais);

            $stmt->execute();
            $pdo = null;
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pais = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            $stmt->rollBack();
        }
    }

    //Editar
    public function alterar($idpais, $descricao) {
        try {
            $sql = 'update pais set idpais=:idpais,descricao=:descricao where idpais= :idpais';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idpais', $idpais);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->execute();
            $pdo = null;
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pais = ' . $sql . '</b> <br /><br />' . $e->getMessage();
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