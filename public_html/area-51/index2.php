<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path."/scripts/php/banco/conexao.php");
    $gestao = $conexao->query("SELECT NOME, SOBRENOME, ID_VOLUNT FROM pes_info_pessoal WHERE TIPO_INFO = 'G'");
    echo "NOME | EMAIL | SETOR/DISCIPLINA | OCUPACAO | DISPONIBILIDADE | CURSO SE FOR ALUNO UFSC<br><br>";
    echo "GESTÃO<br>";
    if(!empty($gestao)){
        foreach($gestao as $g){
            $id_volunt = $g['ID_VOLUNT'];
            $setor = $conexao->query("SELECT S.NOME FROM pes_setor S INNER JOIN pes_setor_gestao SG ON SG.ID_SETOR = S.ID_SETOR AND SG.ID_VOLUNT = '$id_volunt' AND SG.OPCAO = 1");
            echo $g['NOME']." ".$g['SOBRENOME']." | ";
            if(!empty($setor)){
                foreach($setor as $s){
                    echo $s['NOME']." - ";
                }
                $setor->close();
            }
            echo ' | ';
            $v = $conexao->query("SELECT MOTIVO_OPCAO FROM pes_volunt WHERE ID_VOLUNT = $id_volunt LIMIT 1");
            $vol = $v->fetch_array();
            $v->close();
            echo $vol['MOTIVO_OPCAO'];
            echo "<br>";
        }
        $gestao->close();
    }
    echo "<br>PROFS<br>";
    $profs = $conexao->query("SELECT NOME, GENERO, ID_VOLUNT FROM pes_info_pessoal WHERE TIPO_INFO = 'P'");
    if(!empty($profs)){
        foreach($profs as $g){
            $id_volunt = $g['ID_VOLUNT'];
            $setor = $conexao->query("SELECT S.NOME FROM pes_disciplina S INNER JOIN pes_disciplina_prof SG ON SG.ID_DISCIPLINA = S.ID_DISCIPLINA AND SG.ID_VOLUNT = '$id_volunt' AND SG.OPCAO = 1");
            echo $g['NOME']." ".$g['GENERO']." | ";
            if(!empty($setor)){
                foreach($setor as $s){
                    echo $s['NOME']." - ";
                }
                $setor->close();
            }
            echo ' | ';
            $v = $conexao->query("SELECT MOTIVO_OPCAO FROM pes_volunt WHERE ID_VOLUNT = $id_volunt LIMIT 1");
            $vol = $v->fetch_array();
            $v->close();
            echo $vol['MOTIVO_OPCAO'];
            echo "<br>";
        }
        $profs->close();
    }
    $conexao->close();