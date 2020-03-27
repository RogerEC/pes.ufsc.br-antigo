<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path."/scripts/php/banco/conexao.php");
    $gestao = $conexao->query("SELECT NOME, SOBRENOME, ID_VOLUNT, EMAIL FROM pes_info_pessoal WHERE TIPO_INFO = 'G'");
    echo "NOME | EMAIL | SETOR/DISCIPLINA | OCUPACAO | DISPONIBILIDADE | CURSO SE FOR ALUNO UFSC<br><br>";
    echo "GESTÃO<br>";
    if(!empty($gestao)){
        foreach($gestao as $g){
            $id_volunt = $g['ID_VOLUNT'];
            $setor = $conexao->query("SELECT S.NOME FROM pes_setor S INNER JOIN pes_setor_gestao SG ON SG.ID_SETOR = S.ID_SETOR AND SG.ID_VOLUNT = '$id_volunt'");
            echo $g['NOME']." ".$g['SOBRENOME']." | ".$g['EMAIL']." | ";
            if(!empty($setor)){
                foreach($setor as $s){
                    echo $s['NOME']." - ";
                }
                $setor->close();
            }
            echo ' | ';
            $v = $conexao->query("SELECT OCUPACAO, DISP_SEMANAL, ID_CURSO FROM pes_volunt WHERE ID_VOLUNT = $id_volunt LIMIT 1");
            $vol = $v->fetch_array();
            $id_curso = $vol['ID_CURSO'];
            $v->close();
            echo $vol['OCUPACAO']." | ".$vol['DISP_SEMANAL'];
            if($id_curso!=0){
                $c = $conexao->query("SELECT NOME FROM pes_curso WHERE ID_CURSO = $id_curso");
                if(!empty($c)){
                    $cc=$c->fetch_array();
                    $c->close();
                    echo " | ".$cc['NOME'];
                }
            }
            echo "<br>";
        }
        $gestao->close();
    }
    echo "<br>PROFS<br>";
    $profs = $conexao->query("SELECT NOME, SOBRENOME, ID_VOLUNT, EMAIL FROM pes_info_pessoal WHERE TIPO_INFO = 'P'");
    if(!empty($profs)){
        foreach($profs as $g){
            $id_volunt = $g['ID_VOLUNT'];
            $setor = $conexao->query("SELECT S.NOME FROM pes_disciplina S INNER JOIN pes_disciplina_prof SG ON SG.ID_DISCIPLINA = S.ID_DISCIPLINA AND SG.ID_VOLUNT = '$id_volunt'");
            echo $g['NOME']." ".$g['SOBRENOME']." | ".$g['EMAIL']." | ";
            if(!empty($setor)){
                foreach($setor as $s){
                    echo $s['NOME']." - ";
                }
                $setor->close();
            }
            echo ' | ';
            $v = $conexao->query("SELECT OCUPACAO, DISP_SEMANAL, ID_CURSO FROM pes_volunt WHERE ID_VOLUNT = $id_volunt LIMIT 1");
            $vol = $v->fetch_array();
            $id_curso = $vol['ID_CURSO'];
            $v->close();
            echo $vol['OCUPACAO']." | ".$vol['DISP_SEMANAL'];
            if($id_curso!=0){
                $c = $conexao->query("SELECT NOME FROM pes_curso WHERE ID_CURSO = $id_curso");
                if(!empty($c)){
                    $cc=$c->fetch_array();
                    $c->close();
                    echo " | ".$cc['NOME'];
                }
            }
            echo "<br>";
        }
        $profs->close();
    }
    $conexao->close();
?>