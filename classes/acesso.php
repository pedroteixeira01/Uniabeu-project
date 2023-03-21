<?php



class Acesso {

    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $banco = 'cdcdia';
	





    function getHost() {

        return $this->host;

    }



    function getUsuario() {

        return $this->usuario;

    }



    function getSenha() {

        return $this->senha;

    }



    function getBanco() {

        return $this->banco;

    }



    public function conexao() {



        try {

            $pdo = new PDO('mysql:host=' . $this->getHost() . ';dbname=' . $this->getBanco(), $this->getUsuario(), $this->getSenha());

			$pdo->exec("set names utf8");

            return $pdo;

        } catch (PDOException $e) {

            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();

        }

    }



    public function query($sql) {

        $pdo = $this->conexao();

        $rs = $pdo->query($sql);

        if (!$rs) {

            echo " <b>Reveja a consulta (SQL) : $sql</b>";

        }

        $this->result = $rs->fetchAll();

        $this->linha = $rs->rowCount();

    }



    public function execute($sql) {

        $pdo = $this->conexao();

        $rs = $pdo->prepare($sql);

        //$this->linha = $rs->rowCount();        

    }



    public function __destruct() {

        @mysqli_close($this->cnx);

    }



}

?>
