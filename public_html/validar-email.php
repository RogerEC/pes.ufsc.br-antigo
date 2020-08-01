<?php 
    $id = (isset($_GET['id']))? $_GET['id']:null;
    $chave = (isset($_GET['chave']))? $_GET['chave']:null;
    echo $id.".<br>".$chave.".";
?>