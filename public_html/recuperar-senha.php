<?php 
    function gerar_string_aleatoria($size){
        $caracters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $stringAleatoria = '';
        for($i = 0; $i < $size; $i = $i+1){
           $stringAleatoria .= $caracters[mt_rand(0,61)];
        }
        return $stringAleatoria;
    }
    $id="001";
    $link = "https://pes.ufsc.br/validar-email.php?id=".$id."&chave=".gerar_string_aleatoria(64);
    echo $link;
?>