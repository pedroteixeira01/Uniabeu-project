<?php

@session_start();
require_once('classes/traje.php');
require_once('classes/util.php');

function Processo($Processo) {
    /* Atributos Globais */
    $util = new Util();
    $traje = new Traje();

    /* Switch processos */
    switch ($Processo) {
        /* incluir */
        case 'incluir':

            $util->seguranca($_SESSION['idusuario'], 'index.php');
            global $linha;
            global $rs;
            $traje->consultar('select *from evento order by descricao;');
            $linha = $traje->Linha;
            $rs = $traje->Result;

            if (@$_POST['ok'] == 'true') {
                try {
                    //Chamar  
                    $traje->consultar('BEGIN');
                    $traje->incluir($_POST['descricao'], $_POST['idevento']);
                    $traje->consultar('COMMIT');
                    $util->msgbox('REGISTRO SALVO COM SUCESSO!');
                    $util->redirecionamentopage('default.php?pg=' . base64_encode('visao/traje/consulta.php') . '&form=Consulta de Traje');
                } catch (Exception $ex) {
                    $traje->consultar('ROLLBACK');
                    $util->msgbox('Falha de operacao');
                }
            }
            break;

        case 'consulta':
             global $linha;
            global $rs;
            $traje->consultar('select *,t.descricao as descricaoT, e.descricao as descricaoE from traje t inner join evento e on(t.idevento=e.idevento) order by descricaoT;');
            $linha = $traje->Linha;
            $rs = $traje->Result;

            if (@$_POST['ok'] == 'true') {

                $traje->consultar("select *,t.descricao as descricaoT, e.descricao as descricaoE from traje t inner join evento e on(t.idevento=e.idevento) where t.descricao like '%" . $_POST['descricao'] . "%' order by descricaoT");
                $linha = $traje->Linha;
                $rs = $traje->Result;
            }
            break;

        /* editar */
        case 'editar':

            $util->seguranca($_SESSION['idusuario'], 'index.php');
            global $linhaEditar;
            global $rsEditar;

            $traje->consultar("select * from traje where idtraje = " . $_GET['id']);
            $linhaEditar = $traje->Linha;
            $rsEditar = $traje->Result;

            global $linha;
            global $rs;
            $traje->consultar('select *from evento order by descricao;');
            $linha = $traje->Linha;
            $rs = $traje->Result;


            if (@$_POST['ok'] == 'true') {
                try {

                    $traje->consultar('BEGIN');
                    $traje->alterar($_GET['id'], $_POST['descricao'], $_POST['idevento']);

                    $traje->consultar('COMMIT');
                    $util->msgbox('REGISTRO SALVO COM SUCESSO!');
                    $util->redirecionamentopage('default.php?pg=' . base64_encode('visao/traje/consulta.php') . '&form=Consulta de Traje');
                } catch (Exception $ex) {
                    $traje->consultar('ROLLBACK');
                    $util->msgbox('Falha de operacao');
                }
            }
            break;
    }
}

?>