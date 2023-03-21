<?php 
 /* ----------------------------------------------
 Smart Web Developer - SWD 2.0
 Criado em 04/11/2011
 Autor:Vinícius Marques da Silva Ferreira
 Contato:profvmarques@gmail.com
Projeto:cdcdia  Criado em:10/01/2022
 ----------------------------------------------*/ 
require_once('acesso.php');
 require_once('logs.php');

 class Ocorrencia{
//Atributos da classe
private  $idocorrencia;
private  $idusuarios;
private  $idtipo_ocorrencia;
private  $data_ocorrencia;
private  $hora_ocorrencia;
private  $idsolucao;

 //Insert
 public function incluir($idusuarios,$idtipo_ocorrencia,$data_ocorrencia,$hora_ocorrencia,$idsolucao){
 try{
 $dtreg = date('Y-m-d h:i:s');
$sql='insert into ocorrencia(idusuarios,idtipo_ocorrencia,data_ocorrencia,hora_ocorrencia,idsolucao) values( :idusuarios, :idtipo_ocorrencia, :data_ocorrencia, :hora_ocorrencia, :idsolucao);'; 
$sql = str_replace("'", "\'", $sql); 
$acesso = new Acesso(); 
 $pdo=$acesso->conexao(); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
 
 $pdo->beginTransaction(); 
 $stmt = $pdo->prepare($sql);
   
 $stmt->bindParam(':idusuarios', $idusuarios); 
$stmt->bindParam(':idtipo_ocorrencia', $idtipo_ocorrencia); 
$stmt->bindParam(':data_ocorrencia', $data_ocorrencia); 
$stmt->bindParam(':hora_ocorrencia', $hora_ocorrencia); 
$stmt->bindParam(':idsolucao', $idsolucao); 
 $stmt->execute(); 
 $pdo=null; 
 $stmt->commit(); 

$logs = new Logs();
 $logs->incluir($_SESSION['idusuarios'],$sql,'ocorrencia','Inserir');
 } catch (PDOException $e) {
echo 'Error: <b>  na tabela ocorrencia = '.$sql.'</b> <br /><br />'.$e->getMessage(); 
 $stmt->rollBack();
 }
}
 //excluir
 public function excluir($idocorrencia){
 try{
 $sql='delete from ocorrencia where idocorrencia= :idocorrencia'; 
$sql = str_replace("'", "\'", $sql); 
$acesso = new Acesso(); 

 
$pdo=$acesso->conexao(); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
 
 $pdo->beginTransaction(); 
 $stmt = $pdo->prepare($sql);
   
  $stmt->bindParam(':idocorrencia', $idocorrencia); 
 
 $stmt->execute(); 
 $pdo=null; 
 $stmt->commit(); 

$logs = new Logs();
$logs->incluir($_SESSION['idusuarios'],$sql,'ocorrencia','Alterar');
 } catch (PDOException $e) {
echo 'Error: <b>  na tabela ocorrencia = '.$sql.'</b> <br /><br />'.$e->getMessage(); 
 $stmt->rollBack();
 }
 }
 //Editar
 public function alterar($idocorrencia,$idusuarios,$idtipo_ocorrencia,$data_ocorrencia,$hora_ocorrencia,$idsolucao){
 try{
$sql='update ocorrencia set idocorrencia=:idocorrencia,idusuarios=:idusuarios,idtipo_ocorrencia=:idtipo_ocorrencia,data_ocorrencia=:data_ocorrencia,hora_ocorrencia=:hora_ocorrencia,idsolucao=:idsolucao where idocorrencia= :idocorrencia'; 
$sql = str_replace("'", "\'", $sql); 
$acesso = new Acesso(); 

 
$pdo=$acesso->conexao(); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
 
 $pdo->beginTransaction(); 
 $stmt = $pdo->prepare($sql);
   
  $stmt->bindParam(':idocorrencia', $idocorrencia); 
$stmt->bindParam(':idusuarios', $idusuarios); 
$stmt->bindParam(':idtipo_ocorrencia', $idtipo_ocorrencia); 
$stmt->bindParam(':data_ocorrencia', $data_ocorrencia); 
$stmt->bindParam(':hora_ocorrencia', $hora_ocorrencia); 
$stmt->bindParam(':idsolucao', $idsolucao); 
 $stmt->execute(); 
 $pdo=null; 
 $stmt->commit(); 

$logs = new Logs();
$logs->incluir($_SESSION['idusuarios'],$sql,'ocorrencia','Alterar');
 } catch (PDOException $e) {
echo 'Error: <b>  na tabela ocorrencia = '.$sql.'</b> <br /><br />'.$e->getMessage(); 
 $stmt->rollBack();
 }
}
public function consultar($sql) {
$acesso = new Acesso();
$acesso->conexao(); 
$acesso->query($sql); 
$this->Linha = $acesso->linha; 
$this->Result = $acesso->result; 
} 
 

 }
?>