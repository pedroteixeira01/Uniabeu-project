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

class Inscricao {

//Atributos da classe
    private $idinscricao;
    private $idusuario;
    private $idevento;
    private $frequencia;
    private $situacao;

    //Insert
    public function incluir($idusuario, $idevento, $frequencia, $situacao) {
        try {
            $dtreg = date('Y-m-d h:i:s');
            $sql = 'insert into inscricao(idusuario,idevento,frequencia,situacao) values( :idusuario, :idevento, :frequencia, :situacao);';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idusuario', $idusuario);
            $stmt->bindParam(':idevento', $idevento);
            $stmt->bindParam(':frequencia', $frequencia);
            $stmt->bindParam(':situacao', $situacao);
            $stmt->execute();
            $pdo = null;
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela inscricao = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            $stmt->rollBack();
        }
    }

    //excluir
    public function excluir($idinscricao) {
        try {
            $sql = 'delete from inscricao where idinscricao= :idinscricao';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdo->beginTransaction();
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idinscricao', $idinscricao);

            $stmt->execute();
            $pdo = null;
            $stmt->commit();

            $logs = new Logs();
            $logs->incluir($_SESSION['idusuarios'], $sql, 'inscricao', 'Alterar');
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela inscricao = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            $stmt->rollBack();
        }
    }

    //Editar
    public function alterar($idinscricao, $idusuario, $idevento, $frequencia, $situacao) {
        try {
            $sql = 'update inscricao set idinscricao=:idinscricao,idusuario=:idusuario,idevento=:idevento,frequencia=:frequencia,situacao=:situacao where idinscricao= :idinscricao';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdo->beginTransaction();
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idinscricao', $idinscricao);
            $stmt->bindParam(':idusuario', $idusuario);
            $stmt->bindParam(':idevento', $idevento);
            $stmt->bindParam(':frequencia', $frequencia);
            $stmt->bindParam(':situacao', $situacao);
            $stmt->execute();
            $pdo = null;
            $stmt->commit();

            $logs = new Logs();
            $logs->incluir($_SESSION['idusuarios'], $sql, 'inscricao', 'Alterar');
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela inscricao = ' . $sql . '</b> <br /><br />' . $e->getMessage();
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