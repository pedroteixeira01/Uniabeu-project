<?php

session_start();

function Processo($Processo) {


    /* Switch processos */
    switch ($Processo) {

        /* incluir */

        case 'ConsultaParticipante':

            require_once('classes/inscricao.php');
            require_once('classes/util.php');
            $inscricao = new Inscricao();
            $util = new Util();

            global $linha;
            global $rs;
            global $linha2;
            global $rs2;

            $inscricao->consultar('select c.idcolegio as idcolegio, c.descricao as descricaocol, p.descricao as descpais from colegio c INNER join pais p on(c.idpais=p.idpais) order by descpais,descricaocol');
            $rs = $inscricao->Result;
            $linha = $inscricao->Linha;

            if ($_POST['ok'] == 'true') {

                if ($_POST['idcolegio'] == 'Todos') {
                    $inscricao->consultar("select *, DATE_FORMAT(u.nascimento,'%d/%m/%Y') as dtnasc, c.descricao as col, pais.descricao as pais, frh.descricao as fatorrh, t.descricao as tema from usuario u 
inner join perfil p on(u.idperfil=p.idperfil) 
inner join colegio c on(c.idcolegio=u.idcolegio) 
inner join pais on(pais.idpais=u.idpais) 
inner join fator_rh frh on(u.idfator_rh=frh.idfator_rh) 
inner join inscricao i on(i.idusuario=u.idusuario)
INNER join tema t on(u.idtema=t.idtema) where u.idperfil=2 and i.situacao='INSCRITO';");
                    $rs2 = $inscricao->Result;
                    $linha2 = $inscricao->Linha;
                } else {
                    $inscricao->consultar("select *, DATE_FORMAT(u.nascimento,'%d/%m/%Y') as dtnasc, c.descricao as col, pais.descricao as pais, frh.descricao as fatorrh, t.descricao as tema from usuario u 
inner join perfil p on(u.idperfil=p.idperfil) 
inner join colegio c on(c.idcolegio=u.idcolegio) 
inner join pais on(pais.idpais=u.idpais) 
inner join fator_rh frh on(u.idfator_rh=frh.idfator_rh) 
inner join inscricao i on(i.idusuario=u.idusuario)
INNER join tema t on(u.idtema=t.idtema) where u.idperfil=2 and i.situacao='INSCRITO' and u.idcolegio=" . $_POST['idcolegio']);
                    $rs2 = $inscricao->Result;
                    $linha2 = $inscricao->Linha;
                }
            }
            break;

        case 'ListaParticipante':

            require_once('../../classes/inscricao.php');
            require_once('../../classes/util.php');
            $inscricao = new Inscricao();
            $util = new Util();

            global $linhaEditar;
            global $rsEditar;           

                $inscricao->consultar("select *, DATE_FORMAT(u.nascimento,'%d/%m/%Y') as dtnasc, c.descricao as col, pais.descricao as pais, frh.descricao as fatorrh, t.descricao as tema from usuario u 
inner join perfil p on(u.idperfil=p.idperfil) 
inner join colegio c on(c.idcolegio=u.idcolegio) 
inner join pais on(pais.idpais=u.idpais) 
inner join fator_rh frh on(u.idfator_rh=frh.idfator_rh) 
inner join inscricao i on(i.idusuario=u.idusuario)
INNER join tema t on(u.idtema=t.idtema) where u.idperfil=2 and i.situacao='INSCRITO';");
                $rsEditar = $inscricao->Result;
                $linhaEditar = $inscricao->Linha;
           
            break;
    }
}

?>