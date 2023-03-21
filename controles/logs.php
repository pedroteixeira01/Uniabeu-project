<?php 
 session_start(); 
 require_once('classes/logs.php'); 
 require_once('classes/util.php'); 
require_once('classes/ocorrencias.php'); 
 
function Processo($Processo) { 
/* Atributos Globais */ 
 $util = new Util(); 
$logs = new Logs(); 
$ocorrencias = new Ocorrencias(); 
 
/* Switch processos */ 
switch ($Processo) { 
/* incluir*/ 
case 'incluir': 
 
$util->seguranca($_SESSION['idusuarios'], 'index.php'); 
global $linha; 
 global $rs; 
require_once('classes/usuarios.php'); 
 global $linha1; 
 global $rs1;

$usuarios= new Usuarios(); 
$usuarios->consultar("select * from usuarios order by descricao");
$linha1= $usuarios->Linha; 
$rs1= $usuarios->Result;
 
if($_POST['ok'] == 'true') { 
try { 
 //Chamar  
$logs->consultar('BEGIN'); 
$logs->incluir( 
$_POST['idusuarios'],
$_POST['queryexecutada'],
$_POST['dtreg'],
$_POST['tabela'],
$_POST['acao']
); 
$logs->consultar('COMMIT');
$util->msgbox('REGISTRO SALVO COM SUCESSO!'); 
$util->redirecionamentopage('default.php?pg='.base64_encode('view/logs/consulta.php').'&titulo='.base64_encode('Consulta de Logs')); 
} catch (Exception $ex) { 
$logs->consultar('ROLLBACK'); 
$util->msgbox('Falha de operacao');
 } 
 } 
break; 

 case 'consulta': 
 global $linha; 
 global $rs; 
$logs->consultar('select * from logs order by descricao;'); 
$linha = $logs->Linha; 
$rs = $logs->Result; 
 
if ($_POST['ok'] == 'true') { 
 
$logs->consultar("select * from logs where descricao like '%".$_POST['descricao'] ."%' order by descricao"); 
$linha = $logs->Linha; 
$rs = $logs->Result; 
 } 
break;
 
 /* editar*/ 
case 'editar': 
 
$util->seguranca($_SESSION['idusuarios'], 'index.php'); 
require_once('classes/usuarios.php'); 
 global $linhaEditar; 
 global $rsEditar;
global $linha1; 
 global $rs1;

 $logs->consultar("select * from logs where idlogs = ".$_GET['id']); 
$linhaEditar= $logs->Linha; 
$rsEditar= $logs->Result;
 
$usuarios= new Usuarios(); 
$usuarios->consultar("select * from usuarios order by descricao");
$linha1= $usuarios->Linha; 
$rs1= $usuarios->Result;
 

 	 if ($_POST['ok'] == 'true') { 
 	try { 
 
 	$logs->consultar('BEGIN'); 
 	$logs->alterar( 
 $_GET['id'], 
$_POST['idusuarios'],
$_POST['queryexecutada'],
$_POST['dtreg'],
$_POST['tabela'],
$_POST['acao']
); 
$descricao ="Atualização dos dados na tabela logs pelo usuário <b>.$ _SESSION['usuario'] .</b> \n";$funcionalidade ="Atualização de senha";
 $data_hora=date('Y-m-d h:i:s'); 
$ocorrencias->incluir($_SESSION['idusuarios'], utf8_decode($descricao), utf8_decode($funcionalidade), 'A VALIDAR',$data_hora); 
 
$logs->consultar('COMMIT');
$util->msgbox('REGISTRO SALVO COM SUCESSO!'); 
$util->redirecionamentopage('default.php?pg='.base64_encode('view/logs/consulta.php').'&titulo='.base64_encode('Consulta de Logs')); 
} catch (Exception $ex) { 
$logs->consultar('ROLLBACK'); 
$util->msgbox('Falha de operacao');
 } 
 } 
break; 

 }
 
 } 
 
 ?>