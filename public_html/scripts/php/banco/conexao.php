<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path."/../private/senhas/Banco.php");

    $conexao = new mysqli($host_banco, $usuario_banco, $senha_banco, $use_banco);
    
    if($conexao->connect_error){
        die("Erro ao conectar ao banco de dados, entre em contato com o suporte do Cursinho PES em: cursinho@pes.ufsc.br");
    }
    $conexao->set_charset("utf8");
?>