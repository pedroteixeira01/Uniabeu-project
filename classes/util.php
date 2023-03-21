<?php

class Util {

    public function veificarCaptchaGoogle($captcha_data) {
        //biblioteca para o captcha (https://www.youtube.com/watch?v=lfzmaXJ0Sm8)
        require_once "recaptchalib.php";
        // sua chave secreta
        $secret = "6Ldwx4QUAAAAACtKR8MfFIlyjxDsjIWqm39G9hh-";

        // resposta vazia
        $resposta = null;

        // verifique a chave secreta
        $reCaptcha = new ReCaptcha($secret);

        // se submetido, verifique a resposta ($_POST["g-recaptcha-response"])
        if ($captcha_data) {
            $resposta = $reCaptcha->verifyResponse(
                    $_SERVER["REMOTE_ADDR"], $captcha_data
            );
        }

        if ($resposta != null && $resposta->success) {
            $retorno = true;
        } else {
            $retorno = false;
        }
        return $retorno;
    }

    public function carregarFoto($foto) {
        $ext = strtolower(substr($foto['name'], -4)); //Pegando extensão do arquivo
        $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = './foto/'; //Diretório para uploads
        //echo $_SERVER['DOCUMENT_ROOT']; exit;
        move_uploaded_file($foto['name']['tmp_name'], $dir.$new_name);    
       // print_r($foto);
        return $dir.$new_name.$ext;
        
    }

    public function gerarsenha($senha) {
        $password = @crypt($senha, '$2yLM2PZZ5ZyA&%@$');
        return $password;
    }

    public function enviarEmailLiberacao($cpf, $nome, $senha, $email, $perfil, $mensagem, $conteudoArquivo, $arquivo) {
        date_default_timezone_set('Etc/UTC');

        require 'phpmailer/PHPMailerAutoload.php';

        $hostSmtp = "smtp.hostinger.com.br";
        $smtpUser = "contato@alumnisys.org";
        $senhaSmtp = "!@sysesg2018";
        $assunto = "Dados de acesso ao Alumni";

//Create a new PHPMailer instance
        $mail = new PHPMailer;

//Tell PHPMailer to use SMTP
        $mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
        //$mail->SMTPDebug = 3;
//Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

//Set the hostname of the mail server
        $mail->Host = $hostSmtp;
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tsl';

//Whether to use SMTP authentication
        $mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = $smtpUser;

//Password to use for SMTP authentication
        $mail->Password = $senhaSmtp;

//Set who the message is to be sent from
        $mail->setFrom('contato@alumnisys.org', 'Alumni ESG');

//Set an alternative reply-to address
//$mail->addReplyTo('profvmarques@gmail.com', 'First Last');
//Set who the message is to be sent to
        $mail->addAddress($email, $nome);

//Set the subject line
        $mail->Subject = $assunto;

//Replace the plain text body with one created manually
//$mail->AltBody = $mensagem;
        $mail->Body = $mensagem;
        $mail->isHTML(true);

        if ($conteudoArquivo != '' && $arquivo != '') {
//Attach an image file
            $mail->addAttachment('phpmailer/images/phpmailer_mini.png');
            //Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
            $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
        }

        if (!$mail->send()) {
            //$mensagemRetorno = "Mailer Error: " . $mail->ErrorInfo;
            //$this->msgbox($mensagemRetorno);
            $retorno = false;
        } else {
            //$mensagemRetorno = "foi!";
            //$this->msgbox($mensagemRetorno);
            $retorno = true;
        }
    }

    function EnviarEmailCadastro($email, $nome, $mensagem) {

        date_default_timezone_set('Etc/UTC');

        require 'phpmailer/PHPMailerAutoload.php';

        $hostSmtp = "smtp.hostinger.com.br";
        $smtpUser = "contato@alumnisys.org";
        $senhaSmtp = "!@sysesg2018";
        $assunto = "Dados de acesso ao Alumni";

//Create a new PHPMailer instance
        $mail = new PHPMailer;

//Tell PHPMailer to use SMTP
        $mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
        $mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

//Set the hostname of the mail server
        $mail->Host = $hostSmtp;
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tsl';

//Whether to use SMTP authentication
        $mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = $smtpUser;

//Password to use for SMTP authentication
        $mail->Password = $senhaSmtp;

//Set who the message is to be sent from
        $mail->setFrom('contato@alumnisys.org', 'Alumni ESG');

//Set an alternative reply-to address
//$mail->addReplyTo('profvmarques@gmail.com', 'First Last');
//Set who the message is to be sent to
        $mail->addAddress($email, $nome);

//Set the subject line
        $mail->Subject = $assunto;

//Replace the plain text body with one created manually
//$mail->AltBody = $mensagem;
        $mail->Body = $mensagem;
        $mail->isHTML(true);

        if ($conteudoArquivo != '' && $arquivo != '') {
//Attach an image file
            $mail->addAttachment('phpmailer/images/phpmailer_mini.png');
            //Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
            $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
        }

        if (!$mail->send()) {
            //$mensagemRetorno = "Mailer Error: " . $mail->ErrorInfo;
            //$this->msgbox($mensagemRetorno);
            $retorno = false;
        } else {
            //$mensagemRetorno = "foi!";
            //$this->msgbox($mensagemRetorno);
            $retorno = true;
        }
    }

    function EnviarEmaiLivre($email, $assunto, $mensagem) {

        date_default_timezone_set('Etc/UTC');

        require 'phpmailer/PHPMailerAutoload.php';

        /* $hostSmtp = "smtp.gmail.com";
          $smtpUser = "esginternet@gmail.com";
          $senhaSmtp = "Esg@2019"; */

        $hostSmtp = "10.1.100.8";
        $smtpUser = "academico.esg@esg.br";
        $senhaSmtp = "4cd3SG21";

//Create a new PHPMailer instance
        $mail = new PHPMailer;

//Tell PHPMailer to use SMTP
        $mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
        $mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

//Set the hostname of the mail server
        $mail->Host = $hostSmtp;
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
        $mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = $smtpUser;

//Password to use for SMTP authentication
        $mail->Password = $senhaSmtp;

//Set who the message is to be sent from
        $mail->setFrom('vinicius.marques@esg.br', 'Alumni ESG');

//Set an alternative reply-to address
//$mail->addReplyTo('profvmarques@gmail.com', 'First Last');
//Set who the message is to be sent to

        $mail->addAddress("profvmarques@gmail", "eu");

//Set the subject line
        $mail->Subject = $assunto;

//Replace the plain text body with one created manually
//$mail->AltBody = $mensagem;
        $mail->Body = $mensagem;
        $mail->isHTML(true);

        /* if ($conteudoArquivo != '' && $arquivo != '') {
          //Attach an image file
          $mail->addAttachment('phpmailer/images/phpmailer_mini.png');
          //Read an HTML message body from an external file, convert referenced images to embedded,
          //convert HTML into a basic plain-text alternative body
          $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
          } */

        if (!$mail->send()) {
            //$mensagemRetorno = "Mailer Error: " . $mail->ErrorInfo;
            //$this->msgbox($mensagemRetorno);
            $retorno = false;
            exit;
        } else {
            //$mensagemRetorno = "foi!";
            //$this->msgbox($mensagemRetorno);
            $retorno = true;
        }
    }

    function enviarEmailSenha($cpf, $nome, $senha, $email, $perfil) {

        date_default_timezone_set('Etc/UTC');

        require 'phpmailer/PHPMailerAutoload.php';

        /* $hostSmtp = "smtp.gmail.com";
          $smtpUser = "esginternet@gmail.com";
          $senhaSmtp = "Esg@2019";
          $assunto = "Dados de acesso ao Teste"; */

        $hostSmtp = "smtp.vega.esg.br";
        $smtpUser = "vinicius.marques@esg.br";
        $senhaSmtp = "!@Vini02";
        $assunto = "Dados de acesso ao Teste";

        $mensagem = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Sysalumni</title>

</head>

<body>

<div id="all" style="width:550px; background:#fff; margin-top:20px; text-align:center; margin:0 auto; font-family:Arial; font-size:12px">



	<div id="logo"><img src="https://alumnisys.org/sysalumni/images/logook.jpg" width="181" height="55"" /></div>

    <div id="content" style="width:460px; background:#fff; text-align:left; margin:-32px 14px 20px ; padding:30px ">

    	<p>Olá <strong style="color:#000000"><?= $nome; ?></strong></p>

        <p style=" background-color:#000; color:#fff; padding:5px;">Detalhes do seu acesso ao sistema como ' . $perfil . '</p>

        <p><strong>Bem-vindo(a), ' . $nome . '!</p>
        <p>Segue os dados de acesso recuperados.</strong></p>
        <p><strong>Usu&aacute;rio : </strong>' . $cpf . '</p>

        <p><strong>Senha : </strong>' . $senha . '</p>

            

        <p style="margin-top:40px">Por favor, n&atilde;o passe estas informa&ccedil;&otilde;es para terceiros.</p>

        <p>Agora voc&ecirc; pode acessar no: <a href="https://alumnisys.org/sysalumni/" target="_blank" style="color:#f00; text-decoration:none;">https://alumnisys.org/sysalumni/</a></p>

        

        

    </div>

</div>

</body>

</html>';

//Create a new PHPMailer instance
        $mail = new PHPMailer;

//Tell PHPMailer to use SMTP
        $mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
        $mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

//Set the hostname of the mail server
        $mail->Host = $hostSmtp;
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
        $mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = $smtpUser;

//Password to use for SMTP authentication
        $mail->Password = $senhaSmtp;

//Set who the message is to be sent from
        $mail->setFrom('vinicius.marques@esg.br', 'DADOS TESTE');

//Set an alternative reply-to address
//$mail->addReplyTo('profvmarques@gmail.com', 'First Last');
//Set who the message is to be sent to
        $mail->addAddress($email, $nome);

//Set the subject line
        $mail->Subject = $assunto;

//Replace the plain text body with one created manually
//$mail->AltBody = $mensagem;
        $mail->Body = $mensagem;
        $mail->isHTML(true);

        /* if ($conteudoArquivo != '' && $arquivo != '') {
          //Attach an image file
          $mail->addAttachment('phpmailer/images/phpmailer_mini.png');
          //Read an HTML message body from an external file, convert referenced images to embedded,
          //convert HTML into a basic plain-text alternative body
          $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
          } */

        if (!$mail->send()) {
            //$mensagemRetorno = "Mailer Error: " . $mail->ErrorInfo;
            //$this->msgbox($mensagemRetorno);
            $retorno = false;
        } else {
            //$mensagemRetorno = "foi!";
            //$this->msgbox($mensagemRetorno);
            $retorno = true;
        }
    }

    function validarEmail($email) {
        $conta = "^[a-zA-Z0-9\._-]+@";
        $domino = "[a-zA-Z0-9\._-]+.";
        $extensao = "([a-zA-Z]{2,4})$";
        $pattern = $conta . $domino . $extensao;
        if (ereg($pattern, $email))
            return true;
        else
            return false;
    }

    function dataready($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function formatoDataYMD($data) {
        $data_arr = explode("/", $data);
        $datac = $data_arr[2] . '-' . $data_arr[1] . '-' . $data_arr[0];
        return $datac;
    }

    // esta fun??o formata para exibir no view



    public function formatoDataDMY($data) {



        $data_arr = explode("-", $data);
        $datad = $data_arr[2] . '/' . $data_arr[1] . '/' . $data_arr[0];

        return $datad;
    }

    // converte para real



    public function virgula($valor) {



        $conta = strlen($valor);

        switch ($conta) {



            case "1":



                $retorna = "0,0$valor";

                break;

            case "2":



                $retorna = "0,$valor";

                break;

            case "3":



                $d1 = substr("$valor", 0, 1);

                $d2 = substr("$valor", -2, 2);

                $retorna = "$d1,$d2";

                break;

            case "4":



                $d1 = substr("$valor", 0, 2);

                $d2 = substr("$valor", -2, 2);

                $retorna = "$d1,$d2";

                break;

            case "5":



                $d1 = substr("$valor", 0, 3);

                $d2 = substr("$valor", -2, 2);

                $retorna = "$d1,$d2";

                break;

            case "6":



                $d1 = substr("$valor", 1, 3);

                $d2 = substr("$valor", -2, 2);

                $d3 = substr("$valor", 0, 1);

                $retorna = "$d3.$d1,$d2";

                break;

            case "7":



                $d1 = substr("$valor", 2, 3);

                $d2 = substr("$valor", -2, 2);

                $d3 = substr("$valor", 0, 2);

                $retorna = "$d3.$d1,$d2";

                break;

            case "8":



                $d1 = substr("$valor", 3, 3);

                $d2 = substr("$valor", -2, 2);

                $d3 = substr("$valor", 0, 3);

                $retorna = "$d3.$d1,$d2";

                break;
        }



        return $retorna;
    }

    public function trataDataExtenso($data) {







        $data_arr = explode("-", $data);

        // leitura das datas



        $dia = $data_arr[2];

        $mes = $data_arr[1];

        $ano = $data_arr[0];

        //$semana = date('w');
        // configura??o mes







        switch ($mes) {







            case 1: $mes = "Janeiro";

                break;

            case 2: $mes = "Fevereiro";

                break;

            case 3: $mes = "Mar?o";

                break;

            case 4: $mes = "Abril";

                break;

            case 5: $mes = "Maio";

                break;

            case 6: $mes = "Junho";

                break;

            case 7: $mes = "Julho";

                break;

            case 8: $mes = "Agosto";

                break;

            case 9: $mes = "Setembro";

                break;

            case 10: $mes = "Outubro";

                break;

            case 11: $mes = "Novembro";

                break;

            case 12: $mes = "Dezembro";

                break;
        }











        // configura??o semana







        switch ($semana) {







            case 0: $semana = "DOMINGO";

                break;

            case 1: $semana = "SEGUNDA FEIRA";

                break;

            case 2: $semana = "TER?A-FEIRA";

                break;

            case 3: $semana = "QUARTA-FEIRA";

                break;

            case 4: $semana = "QUINTA-FEIRA";

                break;

            case 5: $semana = "SEXTA-FEIRA";

                break;

            case 6: $semana = "S?BADO";

                break;
        }



        //Agora basta imprimir na tela...
        //print ("$semana, $dia DE $mes DE $ano");







        $data = $dia . ' de ' . $mes . ' de ' . $ano;

        return $data;
    }

    //retorna o intervalo em dias



    public function Intervalo_data($data_inicio, $data_termino) {







        //data inicicial



        $data_arr = explode("-", $data_inicio);

        $datac = $data_arr[2] . '-' . $data_arr[1] . '-' . $data_arr[0];

        $d = $data_arr[2];

        $m = $data_arr[1];

        $A = $data_arr[0];

        $data_arr2 = explode("-", $data_termino);

        $d2 = $data_arr2[2];

        $m2 = $data_arr2[1];

        $A2 = $data_arr2[0];

        $diaI = $d;

        $mesI = $m;

        $anoI = $A;

        $diaF = $d2;

        $mesF = $m2;

        $anoF = $A2;

        $dataI = $A . "/" . $m . "/" . $d;

        $dataF = $A2 . "/" . $m2 . "/" . $d2;

        $secI = strtotime($dataI);

        $secF = strtotime($dataF);

        $intervalo = $secF - $secI;

        $dias = $intervalo / 3600 / 24;

        return $dias;
    }

    public function anuenio($dias) {







        $quantidadeAnos = $dias / 365;

        return $quantidadeAnos;
    }

    public function trienio($dias) {







        $quantidadeAnos = $dias / (365 * 3);

        return $quantidadeAnos;
    }

    public function msgbox($msn) {







        echo '<script>alert("' . $msn . '");</script>';
    }

    public function redirecionamentopage($caminho) {







        echo '<script>window.location="' . $caminho . '";</script>';
    }

    public function MsgboxSimNaoNovoCad($msn, $caminhopagesim) {



        //$d='default.php?pg=view/home/home.php';



        echo '<script>



						



						if (confirm("' . $msn . '")){



							window.location="' . $caminhopagesim . '";



						}else{



							window.location="' . $caminhopagesim . '";



						}



						</script>';
    }

    public function seguranca($idusuario, $caminhopage) {







        if ($idusuario == '') {



            echo '<script>window.location="' . $caminhopage . '";</script>';
        }
    }

    public function dias_mes($mes, $ano) {







        if (fmod($ano, 4) == 0) {



            $dias[2] = 28;
        } else {



            $dias[2] = 29;
        }



        $dias[1] = 31;

        $dias[3] = 31;

        $dias[4] = 30;

        $dias[5] = 31;

        $dias[6] = 30;

        $dias[7] = 31;

        $dias[8] = 31;

        $dias[9] = 30;

        $dias[10] = 31;

        $dias[11] = 30;

        $dias[12] = 31;

        return $dias[$mes];
    }

    public function mes_extenso($nmes) {

        $meses[01] = "Janeiro";
        $meses[02] = "Fevereiro";
        $meses[03] = "Março";
        $meses[04] = "Abril";
        $meses[05] = "Maio";
        $meses[06] = "Junho";
        $meses[07] = "Julho";
        /* $meses[08] = "Agosto";
          $meses[09] = "Setembro";
          $meses[10] = "Outubro";
          $meses[11] = "Novembro";
          $meses[12] = "Dezembro"; */

        return $meses[$nmes];
    }

    public function codigoRadomico() {



        $aux = time();

        $codigo = date('Ymd') . "_" . date('his') . "_" . substr(md5($aux), 0, 7);

        return $codigo;
    }

    public function anti_injection($sql) {

// remove palavras que contenham sintaxe sql

        $sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"), "", $sql);

        $sql = trim($sql); //limpa espa�os vazio

        $sql = strip_tags($sql); //tira tags html e php

        $sql = addslashes($sql); //Adiciona barras invertidas a uma string

        return $sql;
    }

    /* ---------------------------------------------M�todos de mensagens em css---------------------- */

    public function msgSucess($msn) {



        $alert = "<div class = \"alert alert-success\">

        <button class = \"close\" data-dismiss = \"alert\">&times;

        </button>

        <strong>Sucesso!</strong>$msg</div>";

        return $alert;
    }

    public function diaSemanaExtenso($data) {

        $ano = substr("$data", 0, 4);

        $mes = substr("$data", 5, -3);

        $dia = substr("$data", 8, 9);

        $diasemana = date("w", mktime(0, 0, 0, $mes, $dia, $ano));

        switch ($diasemana) {

            case"0": $diasemana = "Domingo";

                break;

            case"1": $diasemana = "Segunda-Feira";

                break;

            case"2": $diasemana = "Ter�a-Feira";

                break;

            case"3": $diasemana = "Quarta-Feira";

                break;

            case"4": $diasemana = "Quinta-Feira";

                break;

            case"5": $diasemana = "Sexta-Feira";

                break;

            case"6": $diasemana = "S�bado";

                break;
        }



        return "$diasemana";
    }

    public function diaSemanaAbreviado($data) {

        $ano = $this->obterAno($data);

        $mes = $this->obterMes($data);

        $dia = $this->obterDia($data);

        $diasemana = date("w", mktime(0, 0, 0, $mes, $dia, $ano));

        switch ($diasemana) {

            case"0": $diasemana = "DOM";

                break;

            case"1": $diasemana = "SEG";

                break;

            case"2": $diasemana = "TER";

                break;

            case"3": $diasemana = "QUA";

                break;

            case"4": $diasemana = "QUI";

                break;

            case"5": $diasemana = "SEX";

                break;

            case"6": $diasemana = "SAB";

                break;
        }



        return $diasemana;
    }

    public function diaSemanaAbreviadoIndice($indice) {





        switch ($indice) {

            /* case"0": $indice = "DOM";

              break;

              case"1": $indice = "SEG";

              break;

              case"2": $indice = "TER";

              break;

              case"3": $indice = "QUA";

              break;

              case"4": $indice = "QUI";

              break;

              case"5": $indice = "SEX";

              break;

              case"6": $indice = "SAB";

              break; */
        }



        return $indice;
    }

    public function ultimoDia($ano, $mes) {

        if (((fmod($ano, 4) == 0) && ( fmod($ano, 100) != 0)) || ( fmod($ano, 400) == 0)) {

            $dias_fevereiro = 29;
        } else {

            $dias_fevereiro = 28;
        }

        switch ($mes) {

            /* case 01: return 31;

              break;

              case 02: return $dias_fevereiro;

              break;

              case 03: return 31;

              break;

              case 04: return 30;

              break;

              case 05: return 31;

              break;

              case 06: return 30;

              break;

              case 07: return 31;

              break;

              case 08: return 31;

              break;

              case 09: return 30;

              break;

              case 10: return 31;

              break;

              case 11: return 30;

              break;

              case 12: return 31;

              break; */
        }
    }

    public function obterMes($data) {



        $array = explode('-', $data);

        $ano = $array[0];

        $mes = $array[1];

        $dia = $array[2];

        return $mes;
    }

    public function obterAno($data) {



        $array = explode('-', $data);

        $ano = $array[0];

        $mes = $array[1];

        $dia = $array[2];

        return $ano;
    }

    public function obterDia($data) {



        $array = explode('-', $data);

        $ano = $array[0];

        $mes = $array[1];

        $dia = $array[2];

        return $dia;
    }

    public function obterDiasFeriado($ano = null) {

        if ($ano === null) {

            $ano = intval(date('Y'));
        }



        $pascoa = easter_date($ano); // Limite de 1970 ou ap�s 2037 da easter_date PHP consulta http://www.php.net/manual/pt_BR/function.easter-date.php

        $dia_pascoa = date('j', $pascoa);

        $mes_pascoa = date('n', $pascoa);

        $ano_pascoa = date('Y', $pascoa);

        $feriados = array(
            // Tatas Fixas dos feriados Nacionail Basileiras

            mktime(0, 0, 0, 1, 1, $ano), // Confraterniza��o Universal - Lei n� 662, de 06/04/49
            mktime(0, 0, 0, 4, 21, $ano), // Tiradentes - Lei n� 662, de 06/04/49
            mktime(0, 0, 0, 5, 1, $ano), // Dia do Trabalhador - Lei n� 662, de 06/04/49
            mktime(0, 0, 0, 9, 7, $ano), // Dia da Independ�ncia - Lei n� 662, de 06/04/49
            mktime(0, 0, 0, 10, 12, $ano), // N. S. Aparecida - Lei n� 6802, de 30/06/80
            mktime(0, 0, 0, 11, 2, $ano), // Todos os santos - Lei n� 662, de 06/04/49
            mktime(0, 0, 0, 11, 15, $ano), // Proclama��o da republica - Lei n� 662, de 06/04/49
            mktime(0, 0, 0, 12, 25, $ano), // Natal - Lei n� 662, de 06/04/49
            // These days have a date depending on easter
            mktime(0, 0, 0, $mes_pascoa, $dia_pascoa - 48, $ano_pascoa), //2�feria Carnaval
            mktime(0, 0, 0, $mes_pascoa, $dia_pascoa - 47, $ano_pascoa), //3�feria Carnaval
            mktime(0, 0, 0, $mes_pascoa, $dia_pascoa - 2, $ano_pascoa), //6�feira Santa
            mktime(0, 0, 0, $mes_pascoa, $dia_pascoa, $ano_pascoa), //Pascoa
            mktime(0, 0, 0, $mes_pascoa, $dia_pascoa + 60, $ano_pascoa), //Corpus Cirist
        );

        sort($feriados);

        return $feriados;
    }

    public function verificarDataFeriado($data) {

        $ano = $this->obterAno($data);

        foreach ($this->obterDiasFeriado($ano) as $a) {

            if ($data == date("Y-m-d", $a)) {

                $feriado = 1;
            }
        }



        return $feriado;
    }

    public function gerarNomeArquivoPDF($fileName) {

        $number = rand(10000, 99999);
        if ($fileName == "") {
            $arq = "";
        } else {
            //$nomearq = Explode(" ", $fileName);
            //$arq = $number . "_" . date("YmdHsms") . '.pdf'; 
            $nomearq = $number . "_" . date("YmdHsms") . '.pdf';
        }

        return $nomearq;
    }

    public function verificaExtensaoArquivo($extensoes, $fileName) {
        // Faz a verificaçao da extensao do arquivo
        $extensao = strtolower(end(explode('.', $fileName)));
        if (array_search($extensao, $extensoes) === false) {
            $util->msgbox('POR FAVOR, ENVIE O ARQUIVO COM A SEGUINTE EXTENS\u00c3O: PDF');
            return false;
        } else {
            return true;
        }
    }

    public function moverArquivoDestino($fileTMP, $caminhoDestinoArquivo) {

        if (is_uploaded_file($fileTMP)) {

            // Movendo arquivo para servidor
            if (!move_uploaded_file($fileTMP, $caminhoDestinoArquivo)) {
                $util->msgbox('Erro ao mover arquivo para o destino, por favor verifique com o administrador do sistema');
                return false;
            } else {
                return true;
            }
        } else {
            $util->msgbox('Possível ataque de envio de arquivo, nome do arquivo: ' . $fileTMP);
            return false;
        }
    }

}
?>


