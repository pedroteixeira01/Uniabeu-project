<?php

/* ----------------------------------------------
  Smart Web Developer - SWD 2.0
  Criado em 04/11/2011
  Autor:Vinícius Marques da Silva Ferreira
  Contato:profvmarques@gmail.com
  Projeto:cdcdia  Criado em:10/01/2022
  ---------------------------------------------- */
require_once('acesso.php');

class TipoEvento {

//Atributos da classe
    private $idtipo_evento;
    private $descricao;

    //Insert
    public function incluir($descricao) {
        try {
            
            $sql = 'insert into tipo_evento(descricao) values( :descricao);';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':descricao', $descricao);
            $stmt->execute();
            $pdo = null;
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela tipo_evento = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            $stmt->rollBack();
        }
    }

    //excluir
    public function excluir($idtipo_evento) {
        try {
            $sql = 'delete from tipo_evento where idtipo_evento= :idtipo_evento';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idtipo_evento', $idtipo_evento);

            $stmt->execute();
            $pdo = null;
           

            $logs = new Logs();
            $logs->incluir($_SESSION['idusuarios'], $sql, 'tipo_evento', 'Alterar');
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela tipo_evento = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            $stmt->rollBack();
        }
    }

    //Editar
    public function alterar($idtipo_evento, $descricao) {
        try {
            $sql = 'update tipo_evento set idtipo_evento=:idtipo_evento,descricao=:descricao where idtipo_evento= :idtipo_evento';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idtipo_evento', $idtipo_evento);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->execute();
            $pdo = null;
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela tipo_evento = ' . $sql . '</b> <br /><br />' . $e->getMessage();
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