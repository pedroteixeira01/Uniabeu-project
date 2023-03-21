<?php
ob_start();  //inicia o buffer
require_once('../../controles/relatorios.php');
Processo('ListaParticipante');
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>	
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
<style type="text/css">
<!--
.style1 {font-size: 16px}
.style23 {font-size: 18px; font-weight: bold; }
.style24 {font-size: 18px}
.style26 {font-size: 12px; }
-->
</style>
<body>
<center>
  <p align="center"><img src="../../img/logoAzulClaroEsgFicha.jpg" width="84" height="84" /><br/>
  <strong>ESCOLA SUPERIOR DE GUERRA </strong><br />
  <strong>XXIII CONFERÊNCIA DE DIRETORES DE COLÉGIO DE DEFESA IBERO-AMERICANOS</strong></p>
  <br />
  <p align="center">
  <strong>LISTA DE PARTICIPANTE</strong>
  </p>
  <table width="800" cellpadding="2" cellspacing="0" style="border: 1px solid #000000;">
    <tr>
      <td width="354" style="border: 1px solid #000000;"><strong>NOME</strong></td>
      <td width="236" style="border: 1px solid #000000;"><strong>E-MAIL</strong></td>
      <td width="236" style="border: 1px solid #000000;"><strong>COLÉGIO</strong></td>
      <td width="236" style="border: 1px solid #000000;"><strong>PAÍS</strong></td>
    </tr>
    <?php for($i=0;$i<$linhaEditar;$i++){ ?>
    <tr>
      <td width="354" style="border: 1px solid #000000;"><?php echo $rsEditar[$i]['nome']; ?></td>
      <td width="236" style="border: 1px solid #000000;"><?php echo $rsEditar[$i]['email']; ?></td>
      <td width="236" style="border: 1px solid #000000;"><?php echo $rsEditar[$i]['col']; ?></td>
      <td width="236" style="border: 1px solid #000000;"><?php echo $rsEditar[$i]['pais']; ?></td>
    </tr>
   <?php } ?>
  </table>
  <br />
  <p align="right"><b>Total: <?php echo $linhaEditar;?></b></p>
</center>
  </body>
<?php 

$html = ob_get_clean();
	// pega o conteudo do buffer, insere na variavel e limpa a memória
	 	
	require_once ('../../vendor/autoload.php');
    $mpdf = new \Mpdf\Mpdf();
	 
	//$mpdf = new mPDF();
	// cria o objeto
	 $mpdf->AddPage('P'); // P | L 
	$mpdf->allow_charset_conversion=true;
	// permite a conversao (opcional)
	$mpdf->charset_in='UTF-8';
	// converte todo o PDF para utf-8
	$mpdf->SetDisplayMode('fullpage');
	$mpdf->SetFooter('{DATE j/m/Y  H:i}|{PAGENO}/{nb}| ESG/CDCDIA');
	 
	$mpdf->WriteHTML($html);
	// escreve definitivamente o conteudo no PDF
	 
	$mpdf->Output();
	// imprime
	 
exit();

?> 
