<?php

session_start();
require_once('classes/inscricao.php');
require_once('classes/util.php');
require_once('classes/ocorrencias.php');

function Processo($Processo) {
    /* Atributos Globais */
    $util = new Util();
    $inscricao = new Inscricao();
    $ocorrencias = new Ocorrencias();

    /* Switch processos */
    switch ($Processo) {
        /* incluir */
        case 'incluir':

            $util->seguranca($_SESSION['idusuarios'], 'index.php');
            global $linha;
            global $rs;

            if ($_POST['ok'] == 'true') {
                try {
                    //Chamar  
                    $inscricao->consultar('BEGIN');
                    $inscricao->incluir(
                            $_POST['idusuario'],
                            $_POST['idevento'],
                            $_POST['frequencia'],
                            $_POST['situacao']
                    );
                    $inscricao->consultar('COMMIT');
                    $util->msgbox('REGISTRO SALVO COM SUCESSO!');
                    $util->redirecionamentopage('default.php?pg=' . base64_encode('view/inscricao/consulta.php') . '&titulo=' . base64_encode('Consulta de Inscricao'));
                } catch (Exception $ex) {
                    $inscricao->consultar('ROLLBACK');
                    $util->msgbox('Falha de operacao');
                }
            }
            break;

        case 'consulta':
            global $linha;
            global $rs;
            $inscricao->consultar('select * from inscricao order by descricao;');
            $linha = $inscricao->Linha;
            $rs = $inscricao->Result;

            if ($_POST['ok'] == 'true') {

                $inscricao->consultar("select * from inscricao where descricao like '%" . $_POST['descricao'] . "%' order by descricao");
                $linha = $inscricao->Linha;
                $rs = $inscricao->Result;
            }
            break;

        /* editar */
        case 'editar':

            $util->seguranca($_SESSION['idusuarios'], 'index.php');
            global $linhaEditar;
            global $rsEditar;

            $inscricao->consultar("select * from inscricao where idinscricao = " . $_GET['id']);
            $linhaEditar = $inscricao->Linha;
            $rsEditar = $inscricao->Result;

            if ($_POST['ok'] == 'true') {
                try {

                    $inscricao->consultar('BEGIN');
                    $inscricao->alterar(
                            $_GET['id'],
                            $_POST['idusuario'],
                            $_POST['idevento'],
                            $_POST['frequencia'],
                            $_POST['situacao']
                    );
                    $descricao = "Atualização dos dados na tabela inscricao pelo usuário <b>.$ _SESSION['usuario'] .</b> \n";
                    $funcionalidade = "Atualização de senha";
                    $data_hora = date('Y-m-d h:i:s');
                    $ocorrencias->incluir($_SESSION['idusuarios'], utf8_decode($descricao), utf8_decode($funcionalidade), 'A VALIDAR', $data_hora);

                    $inscricao->consultar('COMMIT');
                    $util->msgbox('REGISTRO SALVO COM SUCESSO!');
                    $util->redirecionamentopage('default.php?pg=' . base64_encode('view/inscricao/consulta.php') . '&titulo=' . base64_encode('Consulta de Inscricao'));
                } catch (Exception $ex) {
                    $inscricao->consultar('ROLLBACK');
                    $util->msgbox('Falha de operacao');
                }
            }
            break;
    }
}

?>