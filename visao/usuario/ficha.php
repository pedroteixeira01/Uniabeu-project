<?php
ob_start();  //inicia o buffer
require_once('../../controles/usuario.php');
Processo('FichaParticipante');
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
        <strong>XXIII CONFERÊNCIA DE DIRETORES DE COLÉGIO DE DEFESA IBERO-AMERICANOS</strong><br />
  </p>
  <p align="center" class="style1"><span class="style23">DADOS CADASTRAIS</span></p>
  <br />
  <center>
  <img src="<?php echo "../.".$rsEditar[0]['foto'];?>" width="120" height="120">
  </center>
  <table width="800" cellpadding="2" cellspacing="0" style="border: 1px solid #000000;">
    <tr>
      <td width="354" style="border: 1px solid #000000;"><strong>NOME:</strong> <?php echo $rsEditar[0]['nome']; ?></td>
      <td width="236" style="border: 1px solid #000000;"><strong>SOBRENOME:</strong> <?php echo $rsEditar[0]['sobrenome']; ?></td>
    </tr>
    <tr>
      <td width="354" style="border: 1px solid #000000;"><strong>DATA DE NASCIMENTO:</strong> <?php echo $rsEditar[0]['dtnasc']; ?></td>
      <td width="236" style="border: 1px solid #000000;"><strong>E-MAIL:</strong> <?php echo $rsEditar[0]['email']; ?></td>
    </tr>
    <tr>
      <td width="354" style="border: 1px solid #000000;"><strong>PAÍS:</strong> <?php echo $rsEditar[0]['pais']; ?></td>
      <td width="236" style="border: 1px solid #000000;"><strong>INSTITUIÇÃO:</strong> <?php echo $rsEditar[0]['col']; ?></td>
    </tr>
    <tr>
      <td style="border: 1px solid #000000;"><strong>POSTO OU FORMAÇÃO PROFISSIONAL:</strong> <?php echo $rsEditar[0]['posto_formacao']; ?></td>
      <td style="border: 1px solid #000000;"><strong>CARGO, FUNÇÃO OU GRAU DE PARENTESCO:</strong> <?php echo $rsEditar[0]['cargo_funcao']; ?></td>
    </tr>
    <tr>
      <td style="border: 1px solid #000000;"><strong>NÚMERO DO PASSAPORTE E VALIDADE:</strong> <?php echo $rsEditar[0]['num_passaporte']; ?></td>
      <td style="border: 1px solid #000000;"><strong>TIPO SANGUÍNEO E FATOR RH:</strong> <?php echo $rsEditar[0]['fatorrh']; ?></td>
    </tr>
    <tr>
      <td style="border: 1px solid #000000;"> <strong>DOENÇAS PRÉ-EXISTENTES:</strong> <?php echo $rsEditar[0]['enfermidades']; ?></td>
      <td style="border: 1px solid #000000;"><strong>ALERGIA A MEDICAMENTOS:</strong> <?php echo $rsEditar[0]['alergia_medicamento']; ?></td>
    </tr>
    <tr>
      <td colspan="2" style="border: 1px solid #000000;"><strong>RESTRIÇÕES ALIMENTARES / RESTRICCIONES EN LA DIETA:</strong>
      <br> <?php echo $rsEditar[0]['restricao_alimentar']; ?></td>
    </tr>
    <tr>
      <td colspan="2" style="border: 1px solid #000000;"><strong>EM CASO DE ACIDENTE, INFORMAR (NOME E TELEFONE DE CONTATO) / EN CASO DE ACIDENTE, INFORMAR (NOMBRE Y TELÉFONO PARA CONTACTO):</strong> <br>
      <?php echo $rsEditar[0]['telefone']; ?></td>
    </tr>
    <tr>
      <td colspan="2" style="border: 1px solid #000000;"><strong>COM RELAÇÃO AO TEMA DA APRESENTAÇÃO DA CONFERÊNCIA / ACERCA DEL TEMA DE LA PONENCIA DE LA CONFERENCIA:</strong> <br>
      <?php echo $rsEditar[0]['tema']; ?></td>
    </tr>
    <tr>
      <td colspan="2" style="border: 1px solid #000000;"><strong>COM RELAÇÃO AOS EXEMPLARES DO LIVRO DA CONFERÊNCIA (10 P/ COLÉGIO) / ACERCA DE LOS EXEMPLARES DEL LIBRO DE LA CONFERENCIA (10 P/ COLEGIO):</strong> <br>
      <?php echo $rsEditar[0]['exemplares']; ?></td>
    </tr>
    <tr>
      <td colspan="2" style="border: 1px solid #000000;"><strong>DADOS DO VOO (IDA E VOLTA) / INFORMACIÓN DEL VUELO (IDA Y VUELTA):</strong> <br>
      <?php echo $rsEditar[0]['dados_voo_volta']; ?></td>
    </tr>
    <tr>
      <td colspan="2" style="border: 1px solid #000000;"><strong>LOGOMARCA DO COLÉGIO / LOGOMARCA DEL COLEGIO</strong> <br>
     <img src="../.<?php echo $rsEditar[0]['logomarca']; ?>"></td>
    </tr>
   
  </table>
  <br />
</center>
  </body>
<?php 

$html = ob_get_clean();
	// pega o conteudo do buffer, insere na variavel e limpa a memória
	 
	$html = $html;
	// converte o conteudo para uft-8
	
	
	require_once ('../../vendor/autoload.php');
    $mpdf = new \Mpdf\Mpdf();
	
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
