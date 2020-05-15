<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path."/scripts/php/banco/conexao.php");

    if(!empty($_POST["email"])){
        
        $email = $_POST["email"];

        $resultado = $conexao->query("SELECT ID_COVID_CADASTRO_GEPES FROM COVID_CADASTRO_GEPES WHERE EMAIL = '{$email}' LIMIT 1");

        if($resultado->num_rows==0){
            echo "true";
        }else{
            echo "false";
        }

        $resultado->close();
        
    }else{
        echo "false";
    }

    $conexao->close();
?>