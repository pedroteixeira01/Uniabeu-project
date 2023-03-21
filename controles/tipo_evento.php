<?php
@session_start();
require_once('classes/tipo_evento.php');
require_once('classes/util.php');

function Processo($Processo) {
    /* Atributos Globais */
    $util = new Util();
    $tipo_evento = new TipoEvento();

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
                    $tipo_evento->consultar('BEGIN');
                    $tipo_evento->incluir($_POST['descricao']);
                    $tipo_evento->consultar('COMMIT');
                    $util->msgbox('REGISTRO SALVO COM SUCESSO!');
                    $util->redirecionamentopage('default.php?pg=' . base64_encode('visao/tipo_evento/consulta.php') . '&form=' . base64_encode('Consulta de Tipo de Evento'));
                } catch (Exception $ex) {
                    $tipo_evento->consultar('ROLLBACK');
                    $util->msgbox('Falha de operacao');
                }
            }
            break;

        case 'consulta':
            global $linha;
            global $rs;
            $tipo_evento->consultar('select * from tipo_evento order by descricao;');
            $linha = $tipo_evento->Linha;
            $rs = $tipo_evento->Result;

            if (@$_POST['ok'] == 'true') {

                $tipo_evento->consultar("select * from tipo_evento where descricao like '%" . $_POST['descricao'] . "%' order by descricao");
                $linha = $tipo_evento->Linha;
                $rs = $tipo_evento->Result;
            }
            break;

        /* editar */
        case 'editar':

            $util->seguranca($_SESSION['idusuario'], 'index.php');
            global $linhaEditar;
            global $rsEditar;

            $tipo_evento->consultar("select * from tipo_evento where idtipo_evento = " . $_GET['id']);
            $linhaEditar = $tipo_evento->Linha;
            $rsEditar = $tipo_evento->Result;

            if (@$_POST['ok'] == 'true') {
                try {

                    $tipo_evento->consultar('BEGIN');
                    $tipo_evento->alterar($_GET['id'], $_POST['descricao']);
                    
                    $tipo_evento->consultar('COMMIT');
                    $util->msgbox('REGISTRO SALVO COM SUCESSO!');
                    $util->redirecionamentopage('default.php?pg=' . base64_encode('visao/tipo_evento/consulta.php') . '&form=Consulta de Tipo_evento');
                } catch (Exception $ex) {
                    $tipo_evento->consultar('ROLLBACK');
                    $util->msgbox('Falha de operacao');
                }
            }
            break;
    }
}

?>