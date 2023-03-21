<?php 
 session_start(); 
 require_once('classes/ocorrencia.php'); 
 require_once('classes/util.php'); 
require_once('classes/ocorrencias.php'); 
 
function Processo($Processo) { 
/* Atributos Globais */ 
 $util = new Util(); 
$ocorrencia = new Ocorrencia(); 
$ocorrencias = new Ocorrencias(); 
 
/* Switch processos */ 
switch ($Processo) { 
/* incluir*/ 
case 'incluir': 
 
$util->seguranca($_SESSION['idusuarios'], 'index.php'); 
global $linha; 
 global $rs; 
require_once('classes/usuarios.php'); 
 require_once('classes/tipo_ocorrencia.php'); 
 require_once('classes/solucao.php'); 
 global $linha1; 
 global $rs1;
global $linha2; 
 global $rs2;
global $linha5; 
 global $rs5;

$usuarios= new Usuarios(); 
$usuarios->consultar("select * from usuarios order by descricao");
$linha1= $usuarios->Linha; 
$rs1= $usuarios->Result;
 
$tipo_ocorrencia= new Tipo_ocorrencia(); 
$tipo_ocorrencia->consultar("select * from tipo_ocorrencia order by descricao");
$linha2= $tipo_ocorrencia->Linha; 
$rs2= $tipo_ocorrencia->Result;
 
$solucao= new Solucao(); 
$solucao->consultar("select * from solucao order by descricao");
$linha5= $solucao->Linha; 
$rs5= $solucao->Result;
 
if($_POST['ok'] == 'true') { 
try { 
 //Chamar  
$ocorrencia->consultar('BEGIN'); 
$ocorrencia->incluir( 
$_POST['idusuarios'],
$_POST['idtipo_ocorrencia'],
$_POST['data_ocorrencia'],
$_POST['hora_ocorrencia'],
$_POST['idsolucao']
); 
$ocorrencia->consultar('COMMIT');
$util->msgbox('REGISTRO SALVO COM SUCESSO!'); 
$util->redirecionamentopage('default.php?pg='.base64_encode('view/ocorrencia/consulta.php').'&titulo='.base64_encode('Consulta de Ocorrencia')); 
} catch (Exception $ex) { 
$ocorrencia->consultar('ROLLBACK'); 
$util->msgbox('Falha de operacao');
 } 
 } 
break; 

 case 'consulta': 
 global $linha; 
 global $rs; 
$ocorrencia->consultar('select * from ocorrencia order by descricao;'); 
$linha = $ocorrencia->Linha; 
$rs = $ocorrencia->Result; 
 
if ($_POST['ok'] == 'true') { 
 
$ocorrencia->consultar("select * from ocorrencia where descricao like '%".$_POST['descricao'] ."%' order by descricao"); 
$linha = $ocorrencia->Linha; 
$rs = $ocorrencia->Result; 
 } 
break;
 
 /* editar*/ 
case 'editar': 
 
$util->seguranca($_SESSION['idusuarios'], 'index.php'); 
require_once('classes/usuarios.php'); 
 require_once('classes/tipo_ocorrencia.php'); 
 require_once('classes/solucao.php'); 
 global $linhaEditar; 
 global $rsEditar;
global $linha1; 
 global $rs1;
global $linha2; 
 global $rs2;
global $linha5; 
 global $rs5;

 $ocorrencia->consultar("select * from ocorrencia where idocorrencia = ".$_GET['id']); 
$linhaEditar= $ocorrencia->Linha; 
$rsEditar= $ocorrencia->Result;
 
$usuarios= new Usuarios(); 
$usuarios->consultar("select * from usuarios order by descricao");
$linha1= $usuarios->Linha; 
$rs1= $usuarios->Result;
 
$tipo_ocorrencia= new Tipo_ocorrencia(); 
$tipo_ocorrencia->consultar("select * from tipo_ocorrencia order by descricao");
$linha2= $tipo_ocorrencia->Linha; 
$rs2= $tipo_ocorrencia->Result;
 
$solucao= new Solucao(); 
$solucao->consultar("select * from solucao order by descricao");
$linha5= $solucao->Linha; 
$rs5= $solucao->Result;
 

 	 if ($_POST['ok'] == 'true') { 
 	try { 
 
 	$ocorrencia->consultar('BEGIN'); 
 	$ocorrencia->alterar( 
 $_GET['id'], 
$_POST['idusuarios'],
$_POST['idtipo_ocorrencia'],
$_POST['data_ocorrencia'],
$_POST['hora_ocorrencia'],
$_POST['idsolucao']
); 
$descricao ="Atualização dos dados na tabela ocorrencia pelo usuário <b>.$ _SESSION['usuario'] .</b> \n";$funcionalidade ="Atualização de senha";
 $data_hora=date('Y-m-d h:i:s'); 
$ocorrencias->incluir($_SESSION['idusuarios'], utf8_decode($descricao), utf8_decode($funcionalidade), 'A VALIDAR',$data_hora); 
 
$ocorrencia->consultar('COMMIT');
$util->msgbox('REGISTRO SALVO COM SUCESSO!'); 
$util->redirecionamentopage('default.php?pg='.base64_encode('view/ocorrencia/consulta.php').'&titulo='.base64_encode('Consulta de Ocorrencia')); 
} catch (Exception $ex) { 
$ocorrencia->consultar('ROLLBACK'); 
$util->msgbox('Falha de operacao');
 } 
 } 
break; 

 }
 
 } 
 
 ?>