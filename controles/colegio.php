<?php

@session_start();
require_once('classes/colegio.php');
require_once('classes/util.php');

function Processo($Processo) {
    /* Atributos Globais */
    $util = new Util();
    $colegio = new Colegio();

    /* Switch processos */
    switch ($Processo) {
        /* incluir */
        case 'incluir':

            $util->seguranca($_SESSION['idusuario'], 'index.php');
            global $linha;
            global $rs;
            
            $colegio->consultar('select * from pais order by descricao');
            $rs=$colegio->Result;
            $linha=$colegio->Linha;
            

            if (@$_POST['ok'] == 'true') {
                try {
                    //Chamar  
                    $colegio->consultar('BEGIN');
                    $colegio->incluir($_POST['descricao'],$_POST['idpais']);
                    $colegio->consultar('COMMIT');
                    $util->msgbox('REGISTRO SALVO COM SUCESSO!');
                    $util->redirecionamentopage('default.php?pg=' . base64_encode('visao/colegio/consulta.php') . '&form=Consulta de Colegio');
                } catch (Exception $ex) {
                    $colegio->consultar('ROLLBACK');
                    $util->msgbox('Falha de operacao');
                }
            }
            break;

        case 'consulta':
            global $linha;
            global $rs;
            $colegio->consultar('select *,c.descricao as descricaocol, p.descricao as descricaoP from colegio c inner join pais p on(c.idpais=p.idpais) order by c.descricao;');
            $linha = $colegio->Linha;
            $rs = $colegio->Result;

            if (@$_POST['ok'] == 'true') {

                $colegio->consultar("select * from colegio where descricao like '%" . $_POST['descricao'] . "%' order by descricao");
                $linha = $colegio->Linha;
                $rs = $colegio->Result;
            }
            break;

        /* editar */
        case 'editar':

            $util->seguranca($_SESSION['idusuario'], 'index.php');
            global $linhaEditar;
            global $rsEditar;

            $colegio->consultar("select * from colegio where idcolegio = " . $_GET['id']);
            $linhaEditar = $colegio->Linha;
            $rsEditar = $colegio->Result;
            
            global $linha;
            global $rs;
            
            $colegio->consultar('select * from pais order by descricao');
            $rs=$colegio->Result;
            $linha=$colegio->Linha;

            if (@$_POST['ok'] == 'true') {
                try {

                    $colegio->consultar('BEGIN');
                    $colegio->alterar($_GET['id'],$_POST['descricao'],$_POST['idpais']);
                                        
                    $colegio->consultar('COMMIT');
                    $util->msgbox('REGISTRO SALVO COM SUCESSO!');
                    $util->redirecionamentopage('default.php?pg=' . base64_encode('visao/colegio/consulta.php') . '&form=Consulta de Colegio');
                } catch (Exception $ex) {
                    $colegio->consultar('ROLLBACK');
                    $util->msgbox('Falha de operacao');
                }
            }
            break;
    }
}

?>