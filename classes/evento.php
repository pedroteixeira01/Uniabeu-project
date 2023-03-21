<?php

/* ----------------------------------------------
  Smart Web Developer - SWD 2.0
  Criado em 04/11/2011
  Autor:Vinícius Marques da Silva Ferreira
  Contato:profvmarques@gmail.com
  Projeto:cdcdia  Criado em:10/01/2022
  ---------------------------------------------- */
require_once('acesso.php');

class Evento {

//Atributos da classe
    private $idevento;
    private $idtipo_evento;
    private $descricao;
    private $data_inicio;
    private $data_termino;

    //Insert
    public function incluir($idtipo_evento, $descricao, $data_inicio, $data_termino) {
        try {
          //$sql = 'insert into evento(idtipo_evento,descricao,data_inicio,data_termino) values("'.$idtipo_evento.'", "'.$descricao.'", "'.$data_inicio.'", "'.$data_termino.'");';
           
            
            $sql = 'insert into evento(idtipo_evento,descricao,data_inicio,data_termino) values( :idtipo_evento, :descricao, :data_inicio, :data_termino);';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idtipo_evento', $idtipo_evento);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':data_inicio', $data_inicio);
            $stmt->bindParam(':data_termino', $data_termino);
            $stmt->execute();
            $pdo = null;

            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela evento = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            $stmt->rollBack();
        }
    }

    //excluir
    public function excluir($idevento) {
        try {
            $sql = 'delete from evento where idevento= :idevento';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idevento', $idevento);

            $stmt->execute();
            $pdo = null;
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela evento = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            $stmt->rollBack();
        }
    }

    //Editar
    public function alterar($idevento, $idtipo_evento, $descricao, $data_inicio, $data_termino) {
        try {
            $sql = 'update evento set idevento=:idevento,idtipo_evento=:idtipo_evento,descricao=:descricao,data_inicio=:data_inicio,data_termino=:data_termino where idevento= :idevento';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idevento', $idevento);
            $stmt->bindParam(':idtipo_evento', $idtipo_evento);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':data_inicio', $data_inicio);
            $stmt->bindParam(':data_termino', $data_termino);
            $stmt->execute();
            $pdo = null;
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela evento = ' . $sql . '</b> <br /><br />' . $e->getMessage();
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