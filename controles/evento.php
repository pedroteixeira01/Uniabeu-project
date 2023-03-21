<?php

@session_start();
require_once('classes/evento.php');
require_once('classes/util.php');

function Processo($Processo) {
    /* Atributos Globais */
    $util = new Util();
    $evento = new Evento();

    /* Switch processos */
    switch ($Processo) {
        /* incluir */
        case 'incluir':

            $util->seguranca($_SESSION['idusuario'], 'index.php');
            global $linha;
            global $rs;
            
            $evento->consultar('select * from tipo_evento order by descricao');
            $rs=$evento->Result;
            $linha=$evento->Linha;
            
            if (@$_POST['ok'] == 'true') {
                try {
                    //Chamar  
                    $evento->consultar('BEGIN');
                    $evento->incluir($_POST['idtipo_evento'],$_POST['descricao'],$util->formatoDataYMD($_POST['data_inicio']),$util->formatoDataYMD($_POST['data_termino']));
                    $evento->consultar('COMMIT');
                    $util->msgbox('REGISTRO SALVO COM SUCESSO!');
                    $util->redirecionamentopage('default.php?pg=' . base64_encode('visao/evento/consulta.php') . '&form=Consulta de Evento');
                } catch (Exception $ex) {
                    $evento->consultar('ROLLBACK');
                    $util->msgbox('Falha de operacao');
                }
            }
            break;

        case 'consulta':
            global $linha;
            global $rs;
            $evento->consultar("select *,DATE_FORMAT(data_inicio,'%d/ %m/ %Y') as dataI, DATE_FORMAT(data_termino,'%d/ %m/ %Y') as dataT  from evento order by descricao;");
            $linha = $evento->Linha;
            $rs = $evento->Result;

            if (@$_POST['ok'] == 'true') {

                $evento->consultar("select *, DATE_FORMAT(data_inicio,'%d/ %m/ %Y') as dataI, DATE_FORMAT(data_termino,'%d/ %m/ %Y') as dataT from evento where descricao like '%" . $_POST['descricao'] . "%' order by descricao");
                $linha = $evento->Linha;
                $rs = $evento->Result;
            }
            break;

        /* editar */
        case 'editar':

            $util->seguranca($_SESSION['idusuario'], 'index.php');
            global $linhaEditar;
            global $rsEditar;

            $evento->consultar("select *, DATE_FORMAT(data_inicio,'%d/ %m/ %Y') as dataI, DATE_FORMAT(data_termino,'%d/ %m/ %Y') as dataT from evento where idevento = " . $_GET['id']);
            $linhaEditar = $evento->Linha;
            $rsEditar = $evento->Result;
            
            global $linha;
            global $rs;
            $evento->consultar('select * from tipo_evento order by descricao;');
            $linha = $evento->Linha;
            $rs = $evento->Result;

            if (@$_POST['ok'] == 'true') {
                try {

                    $evento->consultar('BEGIN');
                    $evento->alterar($_GET['id'],$_POST['idtipo_evento'],$_POST['descricao'],$util->formatoDataYMD($_POST['data_inicio']),$util->formatoDataYMD($_POST['data_termino']));
                    
                    $evento->consultar('COMMIT');
                    $util->msgbox('REGISTRO SALVO COM SUCESSO!');
                    $util->redirecionamentopage('default.php?pg=' . base64_encode('visao/evento/consulta.php') . '&form=Consulta de Evento');
                } catch (Exception $ex) {
                    $evento->consultar('ROLLBACK');
                    $util->msgbox('Falha de operacao');
                }
            }
            break;
    }
}

?>