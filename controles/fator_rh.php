<?php

@session_start();
require_once('classes/fator_rh.php');
require_once('classes/util.php');

function Processo($Processo) {
    /* Atributos Globais */
    $util = new Util();
    $fator_rh = new FatorRH();

    /* Switch processos */
    switch ($Processo) {
        /* incluir */
        case 'incluir':

            $util->seguranca($_SESSION['idusuario'], 'index.php');
            global $linha;
            global $rs;

            if (@$_POST['ok'] == 'true') {
                try {
                    //Chamar  
                    $fator_rh->consultar('BEGIN');
                    $fator_rh->incluir($_POST['descricao']);
                    $fator_rh->consultar('COMMIT');
                    $util->msgbox('REGISTRO SALVO COM SUCESSO!');
                    $util->redirecionamentopage('default.php?pg=' . base64_encode('visao/fator_rh/consulta.php') . '&form=Consulta de Fator_rh');
                } catch (Exception $ex) {
                    $fator_rh->consultar('ROLLBACK');
                    $util->msgbox('Falha de operacao');
                }
            }
            break;

        case 'consulta':
            global $linha;
            global $rs;
            $fator_rh->consultar('select * from fator_rh order by descricao;');
            $linha = $fator_rh->Linha;
            $rs = $fator_rh->Result;

            if (@$_POST['ok'] == 'true') {

                $fator_rh->consultar("select * from fator_rh where descricao like '%" . $_POST['descricao'] . "%' order by descricao");
                $linha = $fator_rh->Linha;
                $rs = $fator_rh->Result;
            }
            break;

        /* editar */
        case 'editar':

            $util->seguranca($_SESSION['idusuario'], 'index.php');
            global $linhaEditar;
            global $rsEditar;

            $fator_rh->consultar("select * from fator_rh where idfator_rh = " . $_GET['id']);
            $linhaEditar = $fator_rh->Linha;
            $rsEditar = $fator_rh->Result;

            if (@$_POST['ok'] == 'true') {
                try {

                    $fator_rh->consultar('BEGIN');
                    $fator_rh->alterar($_GET['id'],$_POST['descricao']);
                    
                    $fator_rh->consultar('COMMIT');
                    $util->msgbox('REGISTRO SALVO COM SUCESSO!');
                    $util->redirecionamentopage('default.php?pg=' . base64_encode('visao/fator_rh/consulta.php') . '&form=Consulta de Fator_rh');
                } catch (Exception $ex) {
                    $fator_rh->consultar('ROLLBACK');
                    $util->msgbox('Falha de operacao');
                }
            }
            break;
    }
}

?>