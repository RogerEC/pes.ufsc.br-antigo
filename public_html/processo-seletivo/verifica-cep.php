<?php 
    if(!empty($_POST["cep"])){
        $cep=$_POST["cep"];
        $cep = preg_replace("/[^0-9]/", "", $cep);
        $url = "http://viacep.com.br/ws/$cep/xml/";
        $xml = simplexml_load_file($url);
        if($xml->erro){
            echo "false";
        }else{
            echo "true";
        }
    }else{
        echo "false";
    }
?>