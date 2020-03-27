<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path."/scripts/php/banco/conexao.php");

    if(!empty($_POST["cpf"]) && !empty($_POST["tipo"])){

        $cpf = $_POST["cpf"];
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        $tipo = $_POST["tipo"];

        $resultado = $conexao->query("SELECT email FROM $tipo WHERE cpf = '{$cpf}' LIMIT 1");

        $email = $resultado->fetch_row()[0];

        echo $email;
        
    }
?>