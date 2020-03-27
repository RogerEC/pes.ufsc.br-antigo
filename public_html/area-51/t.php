<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path."/scripts/php/banco/conexao.php");
    $aluno = $conexao->query("SELECT NOME, SOBRENOME, EMAIL FROM pes_info_pessoal WHERE TIPO_INFO = 'A'");
    if(!empty($aluno)){
        foreach($aluno as $a){
            $email = $a['EMAIL'];
            //$sobrenome = $a['SOBRENOME'];
            //$nome = $a['NOME'];
            echo "$email;";
        }
    }
?>