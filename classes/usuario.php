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

class Usuario {

//Atributos da classe
    private $idusuario;
    private $foto;
    private $nome;
    private $sobrenome;
    private $idcolegio;
    private $idpais;
    private $nascimento;
    private $local_nascimento;
    private $posto_formacao;
    private $cargo_funcao;
    private $num_passaporte;
    private $validade_pass;
    private $idfator_rh;
    private $enfermidades;
    private $alergia_medicamento;
    private $restricao_alimentar;
    private $telefone;
    private $dados_voo_ida;
    private $dados_voo_volta;
    private $email;
    private $senha;
    private $logomarca;
    private $idperfil;
    private $dtreg;

    //Insert
    public function incluir($foto, $nome, $sobrenome, $idcolegio, $idpais, $nascimento, $local_nascimento, $posto_formacao, $cargo_funcao, $num_passaporte, $validade_pass, $idfator_rh, $enfermidades, $alergia_medicamento, $restricao_alimentar, $telefone, $dados_voo_ida, $dados_voo_volta, $email, $senha, $idperfil) {
        try {
            $dtreg = date('Y-m-d h:i:s');
            $sql = 'insert into usuario(foto,nome,sobrenome,idcolegio,idpais,nascimento,local_nascimento,posto_formacao,cargo_funcao,num_passaporte,validade_pass,idfator_rh,enfermidades,alergia_medicamento,restricao_alimentar,telefone,dados_voo_ida,dados_voo_volta,email,senha,idperfil) values( :foto, :nome, :sobrenome, :idcolegio, :idpais, :nascimento, :local_nascimento, :posto_formacao, :cargo_funcao, :num_passaporte, :validade_pass, :idfator_rh, :enfermidades, :restricao_alimentar, :telefone, :dados_voo_ida, :dados_voo_volta, :email, :senha, :idperfil);';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':foto', $foto);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':sobrenome', $sobrenome);
            $stmt->bindParam(':idcolegio', $idcolegio);
            $stmt->bindParam(':idpais', $idpais);
            $stmt->bindParam(':nascimento', $nascimento);
            $stmt->bindParam(':local_nascimento', $local_nascimento);
            $stmt->bindParam(':posto_formacao', $posto_formacao);
            $stmt->bindParam(':cargo_funcao', $cargo_funcao);
            $stmt->bindParam(':num_passaporte', $num_passaporte);
            $stmt->bindParam(':validade_pass', $validade_pass);
            $stmt->bindParam(':idfator_rh', $idfator_rh);
            $stmt->bindParam(':enfermidades', $enfermidades);
            $stmt->bindParam(':alergia_medicamento', $alergia_medicamento);
            $stmt->bindParam(':restricao_alimentar', $restricao_alimentar);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':dados_voo_ida', $dados_voo_ida);
            $stmt->bindParam(':dados_voo_volta', $dados_voo_volta);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':idperfil', $idperfil);
            $stmt->execute();
            $pdo = null;
            

            $logs = new Logs();
            $logs->incluir($_SESSION['idusuarios'], $sql, 'usuario', 'Inserir');
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela usuario = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            
        }
    }

    //excluir
    public function excluir($idusuario) {
        try {
            $sql = 'delete from usuario where idusuario= :idusuario';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdo->beginTransaction();
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idusuario', $idusuario);

            $stmt->execute();
            $pdo = null;
            $stmt->commit();

            $logs = new Logs();
            $logs->incluir($_SESSION['idusuarios'], $sql, 'usuario', 'Alterar');
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela usuario = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            $stmt->rollBack();
        }
    }

    //Editar
    public function alterarUsuarioInscricao($idusuario, $foto, $nome, $sobrenome, $idcolegio, $idpais, $nascimento, $local_nascimento, $posto_formacao, $cargo_funcao, $num_passaporte, $validade_pass, $idfator_rh, $enfermidades, $alergia_medicamento, $restricao_alimentar, $telefone, $idtema,$dados_voo_ida, $dados_voo_volta, $email, $senha,$logomarca) {
        try {
            $sql = 'update usuario set idusuario=:idusuario,foto=:foto,nome=:nome,sobrenome=:sobrenome,idcolegio=:idcolegio,idpais=:idpais,nascimento=:nascimento,local_nascimento=:local_nascimento,posto_formacao=:posto_formacao,cargo_funcao=:cargo_funcao,num_passaporte=:num_passaporte,validade_pass=:validade_pass,idfator_rh=:idfator_rh,enfermidades=:enfermidades,alergia_medicamento=:alergia_medicamento,restricao_alimentar=:restricao_alimentar,telefone=:telefone,idtema=:idtema,dados_voo_ida=:dados_voo_ida,dados_voo_volta=:dados_voo_volta,email=:email,senha=:senha, logomarca=:logomarca where idusuario= :idusuario';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idusuario', $idusuario);
            $stmt->bindParam(':foto', $foto);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':sobrenome', $sobrenome);
            $stmt->bindParam(':idcolegio', $idcolegio);
            $stmt->bindParam(':idpais', $idpais);
            $stmt->bindParam(':nascimento', $nascimento);
            $stmt->bindParam(':local_nascimento', $local_nascimento);
            $stmt->bindParam(':posto_formacao', $posto_formacao);
            $stmt->bindParam(':cargo_funcao', $cargo_funcao);
            $stmt->bindParam(':num_passaporte', $num_passaporte);
            $stmt->bindParam(':validade_pass', $validade_pass);
            $stmt->bindParam(':idfator_rh', $idfator_rh);
            $stmt->bindParam(':enfermidades', $enfermidades);
            $stmt->bindParam(':alergia_medicamento', $alergia_medicamento);            
            $stmt->bindParam(':restricao_alimentar', $restricao_alimentar);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':idtema', $idtema);
            $stmt->bindParam(':dados_voo_ida', $dados_voo_ida);
            $stmt->bindParam(':dados_voo_volta', $dados_voo_volta);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':logomarca', $logomarca);            
            $stmt->execute();
            $pdo = null;
            

            $logs = new Logs();
            $logs->incluir($_SESSION['idusuarios'], $sql, 'inscricao', 'Alterar');
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela usuario = ' . $sql . '</b> <br /><br />' . $e->getMessage();
            
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