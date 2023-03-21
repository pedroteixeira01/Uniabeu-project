<?php

@session_start();

function Processo($Processo) {
    /* Atributos Globais */



    /* Switch processos */
    switch ($Processo) {
        /* incluir */
        case 'incluir':
            require_once('classes/usuario.php');
            require_once('classes/inscricao.php');
            require_once('classes/util.php');
            $util = new Util();
            $usuario = new Usuario();
            $inscricao = new Inscricao();

            //$util->seguranca($_SESSION['idusuarios'], 'index.php');
            global $linha;
            global $rs;
            global $linha2;
            global $rs2;
            global $linha3;
            global $rs3;

            $usuario->consultar("select * from pais");
            $linha = $usuario->Linha;
            $rs = $usuario->Result;

            $usuario->consultar("select * from colegio");
            $linha2 = $usuario->Linha;
            $rs2 = $usuario->Result;

            $usuario->consultar("select * from fator_rh");
            $linha3 = $usuario->Linha;
            $rs3 = $usuario->Result;

            if ($_POST['ok'] == 'true') {
                try {
                    //Chamar  
                    $usuario->consultar('BEGIN');
                    $usuario->incluir($_POST['idusuario'], $_POST['foto'], $_POST['nome'], $_POST['sobrenome'], $_POST['idcolegio'], $_POST['idpais'], $_POST['nascimento'],
                            $_POST['local_nascimento'], $_POST['posto_formacao'], $_POST['cargo_funcao'], $_POST['num_passaporte'],
                            $_POST['validade_pass'], $_POST['idfator_rh'], $_POST['enfermidades'], $_POST['restricao_alimentar'],
                            $_POST['telefone'], $_POST['dados_voo_ida'], $_POST['dados_voo_volta'], $_POST['email'],
                            $_POST['senha'], $_POST['idperfil']);
                    $usuario->consultar('COMMIT');
                    $util->msgbox('REGISTRO SALVO COM SUCESSO!');
                    if ($_POST['pgIdioma'] == 'es') {
                        $util->redirecionamentopage('http://xxiiicdcdia.esg.br/cdcdia/principal_es.php');
                    } else {
                        $util->redirecionamentopage('http://xxiiicdcdia.esg.br/cdcdia/principal.php');
                    }
                } catch (Exception $ex) {
                    $usuario->consultar('ROLLBACK');
                    $util->msgbox('Falha de operacao');
                }
            }
            break;

        case 'consulta':
            require_once('classes/usuario.php');
            require_once('classes/inscricao.php');
            require_once('classes/util.php');
            $util = new Util();
            $usuario = new Usuario();

            global $linha;
            global $rs;
            $usuario->consultar('select * from usuario order by descricao;');
            $linha = $usuario->Linha;
            $rs = $usuario->Result;

            if ($_POST['ok'] == 'true') {

                $usuario->consultar("select * from usuario where descricao like '%" . $_POST['descricao'] . "%' order by descricao");
                $linha = $usuario->Linha;
                $rs = $usuario->Result;
            }
            break;

        /* editar */
        case 'EditarUsuarioInscricao':
            require_once('classes/usuario.php');
            require_once('classes/inscricao.php');
            require_once('classes/util.php');
            $util = new Util();
            $usuario = new Usuario();
            $inscricao = new Inscricao();

            //$util->seguranca($_SESSION['idusuarios'], 'index.php');
            global $linha;
            global $rs;
            global $linha2;
            global $rs2;
            global $linha3;
            global $rs3;
            global $linha4;
            global $rs4;
            global $fotoBD;
            global $logomarcaBD;
            global $linhaEditar;
            global $rsEditar;

            $usuario->consultar("select * from pais");
            $linha = $usuario->Linha;
            $rs = $usuario->Result;

            $usuario->consultar("select * from colegio");
            $linha2 = $usuario->Linha;
            $rs2 = $usuario->Result;

            $usuario->consultar("select * from fator_rh");
            $linha3 = $usuario->Linha;
            $rs3 = $usuario->Result;

            $usuario->consultar("select * from tema");
            $linha4 = $usuario->Linha;
            $rs4 = $usuario->Result;

            $sql = "select *, DATE_FORMAT(u.nascimento,'%d/%m/%Y') as dtnasc from usuario u inner join perfil p on(u.idperfil=p.idperfil) where u.idusuario=" . $_SESSION['idusuario'];
            $usuario->consultar($sql);
            $rsEditar = $usuario->Result;
            $linhaEditar = $usuario->Linha;
            $fotoBD = $rsEditar[0]['foto'];
            $logomarcaBD = $rsEditar[0]['logomarca'];
            $id = $rsEditar[0]['idusuario'];

            if ($_POST['ok'] == 'true') {

                //$foto = $util->carregarFoto($_FILES['foto']);


                try {
//--------------------------------------Foto-----------------------------------------                    
                    if ($fotoBD == "" && $_FILES['foto']['name'] != "") {

                        $ext = strtolower(substr($_FILES['foto']['name'], -4)); //Pegando extensão do arquivo
                        $new_name = date("Y.m.d-H.i.s") . "_" . $id . $ext; //Definindo um novo nome para o arquivo
                        $dir = './foto/'; //Diretório para uploads
                        move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $new_name);
                        $foto = $dir . $new_name;
                        unlink($fotoBD);
                    }

                    if ($fotoBD != "" && $_FILES['foto']['name'] != "") {
                        $ext = strtolower(substr($_FILES['foto']['name'], -4)); //Pegando extensão do arquivo
                        //if ( strstr ( '.jpg;.jpeg;.gif;.png', $ext ) ) {
                        $new_name = date("Y.m.d-H.i.s") . "_" . $id . $ext; //Definindo um novo nome para o arquivo
                        $dir = './foto/'; //Diretório para uploads
                        move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $new_name);
                        $foto = $dir . $new_name;
                        unlink($fotoBD);
                        //}
                    }

                    if ($fotoBD != '' && $_FILES['foto']['name'] == "") {
                        $foto = $fotoBD;
                    }
                    //---------------------------LogoMarca------------------------------------------------                   

                    if ($logomarcaBD == "" && $_FILES['logomarca']['name'] != "") {

                        $ext = strtolower(substr($_FILES['logomarca']['name'], -4)); //Pegando extensão do arquivo
                        $new_name = date("Y.m.d-H.i.s") . "_" . $id . $ext; //Definindo um novo nome para o arquivo
                        $dir = './arquivo/'; //Diretório para uploads
                        move_uploaded_file($_FILES['logomarca']['tmp_name'], $dir . $new_name);
                        $logomarca = $dir . $new_name;
                        unlink($logomarcaBD);
                    }

                    if ($logomarcaBD != "" && $_FILES['logomarca']['name'] != "") {
                        $ext = strtolower(substr($_FILES['logomarca']['name'], -4)); //Pegando extensão do arquivo
                        $new_name = date("Y.m.d-H.i.s") . "_" . $id . $ext; //Definindo um novo nome para o arquivo
                        $dir = './arquivo/'; //Diretório para uploads
                        move_uploaded_file($_FILES['logomarca']['tmp_name'], $dir . $new_name);
                        $logomarca = $dir . $new_name;
                        unlink($logomarcaBD);
                    }

                    if ($fotoBD != '' && $_FILES['logomarca']['name'] == "") {
                        $logomarca = $logomarcaBD;
                    }




                    $usuario->consultar('BEGIN');
                    $usuario->alterarUsuarioInscricao($_POST['idusuario'], $foto, $_POST['nome'], $_POST['sobrenome'], $_POST['idcolegio'], $_POST['idpais'], $util->formatoDataYMD($_POST['nascimento']),
                            $_POST['local_nascimento'], $_POST['posto_formacao'], $_POST['cargo_funcao'], $_POST['num_passaporte'],
                            $_POST['validade_pass'], $_POST['idfator_rh'], $_POST['enfermidades'], $_POST['alergia_medicamento'], $_POST['restricao_alimentar'],
                            $_POST['telefone'], $_POST['idtema'], $_POST['dados_voo_ida'], $_POST['dados_voo_volta'], $_POST['email'],
                            $rsEditar[0]['senha'], $logomarca);

                    $inscricao->consultar("select * from inscricao where idusuario=" . $_SESSION['idusuario']);
                    $rsInsc = $inscricao->Result;
                    $linhaInsc = $inscricao->Linha;

                    if ($linhaInsc == 0) {
                        $inscricao->incluir($_POST['idusuario'], 1, 0, 'INSCRITO');
                    }

                    $usuario->consultar('COMMIT');

                    if ($_POST['pgIdioma'] == 'es') {
                        //$mail->enviarEmail("profvmarques@gmail.com", "XXIII Conferência de Diretores de Colégio de Defesa Ibero-Americanos - Evento presencial", "Inscrição realizada", $_POST['nome']);
                        $util->msgbox('Su inscripción ha sido realizada con succeso');
                        $util->redirecionamentopage('principal_es.php');
                    } else {
                        //$mail->enviarEmail("profvmarques@gmail.com", "XXIII Conferencia de Directores de Colegios de Defensa Iberoamericanas - evento presencial", $_POST['nome']);
                        $util->msgbox('Inscrição realizada com sucesso');
                        $util->redirecionamentopage('principal.php');
                    }
                } catch (Exception $ex) {
                    $usuario->consultar('ROLLBACK');
                    $util->msgbox('Falha de operacao');
                }
            }
            break;

        case 'FichaParticipante':
            require_once('../../classes/usuario.php');
            require_once('../../classes/inscricao.php');
            require_once('../../classes/util.php');
            $util = new Util();
            $usuario = new Usuario();
            $inscricao = new Inscricao();

            //$util->seguranca($_SESSION['idusuarios'], 'index.php');

            global $linhaEditar;
            global $rsEditar;
            global $fotoBD;
            global $logomarcaBD;

            $sql = "select *, DATE_FORMAT(u.nascimento,'%d/%m/%Y') as dtnasc, c.descricao as col, pais.descricao as pais, frh.descricao as fatorrh, t.descricao as tema from usuario u 
inner join perfil p on(u.idperfil=p.idperfil) 
inner join colegio c on(c.idcolegio=u.idcolegio) 
inner join pais on(pais.idpais=u.idpais) 
inner join fator_rh frh on(u.idfator_rh=frh.idfator_rh) 
INNER join tema t on(u.idtema=t.idtema) where u.idusuario=".$_GET['id'];
            $usuario->consultar($sql);
            $rsEditar = $usuario->Result;
            $linhaEditar = $usuario->Linha;
            $fotoBD = $rsEditar[0]['foto']; 
            $logomarcaBD = $rsEditar[0]['logomarca'];
            
            break;
    }
}

?>