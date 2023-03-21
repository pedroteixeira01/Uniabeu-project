<?php

@session_start();
require_once('classes/pais.php');
require_once('classes/util.php');

function Processo($Processo) {
    /* Atributos Globais */
    $util = new Util();
    $pais = new Pais();

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
                    $pais->consultar('BEGIN');
                    $pais->incluir(
                            $_POST['descricao']
                    );
                    $pais->consultar('COMMIT');
                    $util->msgbox('REGISTRO SALVO COM SUCESSO!');
                    $util->redirecionamentopage('default.php?pg=' . base64_encode('visao/pais/consulta.php') . '&form=Consulta de País');
                } catch (Exception $ex) {
                    $pais->consultar('ROLLBACK');
                    $util->msgbox('Falha de operacao');
                }
            }
            break;

        case 'consulta':
            global $linha;
            global $rs;
            $pais->consultar('select * from pais order by descricao;');
            $linha = $pais->Linha;
            $rs = $pais->Result;

            if (@$_POST['ok'] == 'true') {

                $pais->consultar("select * from pais where descricao like '%" . $_POST['descricao'] . "%' order by descricao");
                $linha = $pais->Linha;
                $rs = $pais->Result;
            }
            break;

        /* editar */
        case 'editar':

            $util->seguranca($_SESSION['idusuario'], 'index.php');
            global $linhaEditar;
            global $rsEditar;

            $pais->consultar("select * from pais where idpais = " . $_GET['id']);
            $linhaEditar = $pais->Linha;
            $rsEditar = $pais->Result;

            if (@$_POST['ok'] == 'true') {
                try {

                    $pais->consultar('BEGIN');
                    $pais->alterar($_GET['id'],$_POST['descricao']);
                    
                    $pais->consultar('COMMIT');
                    $util->msgbox('REGISTRO SALVO COM SUCESSO!');
                    $util->redirecionamentopage('default.php?pg=' . base64_encode('visao/pais/consulta.php') . '&form=Consulta de País');
                } catch (Exception $ex) {
                    $pais->consultar('ROLLBACK');
                    $util->msgbox('Falha de operacao');
                }
            }
            break;
    }
}

?>