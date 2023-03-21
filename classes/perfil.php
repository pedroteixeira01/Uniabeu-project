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

 class Perfil{
//Atributos da classe
private  $idperfil;
private  $descricao;
private  $dtreg;

 //Insert
 public function incluir($descricao,$dtreg){
 try{
 $dtreg = date('Y-m-d h:i:s');
$sql='insert into perfil(descricao,dtreg) values( :descricao, :dtreg);'; 
$sql = str_replace("'", "\'", $sql); 
$acesso = new Acesso(); 
 $pdo=$acesso->conexao(); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
 
 $pdo->beginTransaction(); 
 $stmt = $pdo->prepare($sql);
   
 $stmt->bindParam(':descricao', $descricao); 
$stmt->bindParam(':dtreg', $dtreg); 
 $stmt->execute(); 
 $pdo=null; 
 $stmt->commit(); 

$logs = new Logs();
 $logs->incluir($_SESSION['idusuarios'],$sql,'perfil','Inserir');
 } catch (PDOException $e) {
echo 'Error: <b>  na tabela perfil = '.$sql.'</b> <br /><br />'.$e->getMessage(); 
 $stmt->rollBack();
 }
}
 //excluir
 public function excluir($idperfil){
 try{
 $sql='delete from perfil where idperfil= :idperfil'; 
$sql = str_replace("'", "\'", $sql); 
$acesso = new Acesso(); 

 
$pdo=$acesso->conexao(); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
 
 $pdo->beginTransaction(); 
 $stmt = $pdo->prepare($sql);
   
  $stmt->bindParam(':idperfil', $idperfil); 
 
 $stmt->execute(); 
 $pdo=null; 
 $stmt->commit(); 

$logs = new Logs();
$logs->incluir($_SESSION['idusuarios'],$sql,'perfil','Alterar');
 } catch (PDOException $e) {
echo 'Error: <b>  na tabela perfil = '.$sql.'</b> <br /><br />'.$e->getMessage(); 
 $stmt->rollBack();
 }
 }
 //Editar
 public function alterar($idperfil,$descricao,$dtreg){
 try{
$sql='update perfil set idperfil=:idperfil,descricao=:descricao,dtreg=:dtreg where idperfil= :idperfil'; 
$sql = str_replace("'", "\'", $sql); 
$acesso = new Acesso(); 

 
$pdo=$acesso->conexao(); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
 
 $pdo->beginTransaction(); 
 $stmt = $pdo->prepare($sql);
   
  $stmt->bindParam(':idperfil', $idperfil); 
$stmt->bindParam(':descricao', $descricao); 
$stmt->bindParam(':dtreg', $dtreg); 
 $stmt->execute(); 
 $pdo=null; 
 $stmt->commit(); 

$logs = new Logs();
$logs->incluir($_SESSION['idusuarios'],$sql,'perfil','Alterar');
 } catch (PDOException $e) {
echo 'Error: <b>  na tabela perfil = '.$sql.'</b> <br /><br />'.$e->getMessage(); 
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