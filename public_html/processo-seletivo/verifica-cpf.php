<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path."/scripts/php/banco/conexao.php");

    if(!empty($_POST["cpf"])){

        $cpf = preg_replace('/[^0-9]/', '', $_POST["cpf"]);

        $resultado = $conexao->query("SELECT ID_USUARIO FROM pes_usuario WHERE USUARIO = '{$cpf}' LIMIT 1");

        if($resultado->num_rows == 0){
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