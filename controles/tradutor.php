<?php
@session_start();
require_once('classes/tradutor.php');
require_once('classes/util.php');

function Processo($Processo) {
    /* Atributos Globais */
    $util = new Util();

    /* Switch processos */
    switch ($Processo) {
        /* incluir */
        case 'traduzir':

            $tradutor = new Tradutor();
        break;
    }
}

?>