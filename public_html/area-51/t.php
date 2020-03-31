<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path."/scripts/php/banco/conexao.php");
    $aluno = $conexao->query("SELECT ID_ALUNO FROM pes_aluno");
    if(!empty($aluno)){
        /*foreach($aluno as $a){
            $email = $a['EMAIL'];
            //$sobrenome = $a['SOBRENOME'];
            //$nome = $a['NOME'];
            echo "$email;";
        }*/
        echo $aluno->num_rows;
    }
?>