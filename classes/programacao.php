<?php

/* ----------------------------------------------
  Smart Web Developer - SWD 2.0
  Criado em 04/11/2011
  Autor:Vinícius Marques da Silva Ferreira
  Contato:profvmarques@gmail.com
  Projeto:cdcdia  Criado em:10/01/2022
  ---------------------------------------------- */
require_once('acesso.php');
require_once('logs.php');

class Programacao {

//Atributos da classe
    private $idprogramacao;
    private $data_programacao;
    private $horario;
    private $tema;
    private $idcolegio;

    //Insert
    public function incluir($data_programacao, $horario, $tema, $idcolegio) {
        try {
            //$sql = 'insert into programacao(data_programacao,horario,tema,idcolegio) values( "'.$data_programacao.'", "'.$horario.'", "'.$tema.'", "'.$idcolegio.'");';
            $sql = 'insert into programacao(data_programacao,horario,tema,idcolegio) values( :data_programacao, :horario, :tema, :idcolegio);';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':data_programacao', $data_programacao);
            $stmt->bindParam(':horario', $horario);
            $stmt->bindParam(':tema', $tema);
            $stmt->bindParam(':idcolegio', $idcolegio);
            $stmt->execute();
            $pdo = null;
          

            $logs = new Logs();
            $logs->incluir($_SESSION['idusuarios'], $sql, 'programacao', 'Inserir');
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela programacao = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            $stmt->rollBack();
        }
    }

    //excluir
    public function excluir($idprogramacao) {
        try {
            $sql = 'delete from programacao where idprogramacao= :idprogramacao';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdo->beginTransaction();
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idprogramacao', $idprogramacao);

            $stmt->execute();
            $pdo = null;
            $stmt->commit();

            $logs = new Logs();
            $logs->incluir($_SESSION['idusuarios'], $sql, 'programacao', 'Alterar');
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela programacao = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            $stmt->rollBack();
        }
    }

    //Editar
    public function alterar($idprogramacao, $data_programacao, $horario, $tema, $idcolegio) {
        try {
            $sql = 'update programacao set idprogramacao=:idprogramacao,data_programacao=:data_programacao,horario=:horario,tema=:tema,idcolegio=:idcolegio where idprogramacao= :idprogramacao';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idprogramacao', $idprogramacao);
            $stmt->bindParam(':data_programacao', $data_programacao);
            $stmt->bindParam(':horario', $horario);
            $stmt->bindParam(':tema', $tema);
            $stmt->bindParam(':idcolegio', $idcolegio);
            $stmt->execute();
            $pdo = null;
            

        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela programacao = ' . $sql . '</b> <br /><br />' . $e->getMessage();
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