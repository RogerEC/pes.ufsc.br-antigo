<?php
    header ('Content-type: text/html; charset=utf-8');
    ini_set('default_charset','utf-8');
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path."/scripts/php/banco/conexao.php");

    $timezone = new DateTimeZone('America/Sao_Paulo');

    if(!empty($_POST["cpf"])){

        $cpf = preg_replace('/[^0-9]/', '', $_POST["cpf"]);
        $consulta = $conexao->query("SELECT ID_USUARIO FROM pes_usuario WHERE USUARIO = '{$cpf}' LIMIT 1");
        if($consulta->num_rows == 0){
            echo "_INEXISTENTE_";
        }else{
            $objeto = $consulta->fetch_object();
            $id_usuario = $objeto->ID_USUARIO; 
            $consulta = $conexao->query("SELECT * FROM pes_info_pessoal WHERE ID_USUARIO = $id_usuario");
            $info_pessoal = $consulta->fetch_object();
            $id_voluntario = $info_pessoal->ID_VOLUNT;
            $consulta = $conexao->query("SELECT * FROM pes_volunt WHERE ID_VOLUNT = $id_voluntario");  
            $voluntario = $consulta->fetch_object();
            $consulta = $conexao->query("SELECT ID_SETOR FROM pes_setor_gestao WHERE ID_VOLUNT = $id_voluntario ORDER BY OPCAO ASC");
            $setores = array();
            for($i=0; $i<$consulta->num_rows; $i++) $setores[] = $consulta->fetch_object();
            $consulta = $conexao->query("SELECT a.NOME, a.NOME_PROF FROM pes_atividade_antiga a, pes_atividade_antiga_voluntario b WHERE a.ID_ATIVIDADE_ANTIGA = b.ID_ATIVIDADE_ANTIGA AND b.ID_VOLUNT = $id_voluntario");
            $atv_antiga = array();
            for($i=0; $i<$consulta->num_rows; $i++) $atv_antiga[] = $consulta->fetch_object();
            $consulta = $conexao->query("SELECT a.NOME, a.CARGA_HORARIA FROM pes_atividade_atual a, pes_atividade_atual_voluntario b WHERE a.ID_ATIVIDADE_ATUAL = b.ID_ATIVIDADE AND b.ID_VOLUNT = $id_voluntario");
            $atv_atual = array();
            for($i=0; $i<$consulta->num_rows; $i++) $atv_atual[] = $consulta->fetch_object();

            $data_nasc = DateTime::createFromFormat('Y-m-d', trim($info_pessoal->DATA_NASC), $timezone);

            $info_voluntario = array(
                "nome" => trim($info_pessoal->NOME),
                "sobrenome" => trim($info_pessoal->SOBRENOME),
                "sexo" => trim($info_pessoal->GENERO),
                "data_nasc" => $data_nasc->format('d/m/Y'),
                "email" => trim($info_pessoal->EMAIL),
                "telefone" => trim($info_pessoal->NUM_WPP),
                "tipo_info" => trim($info_pessoal->TIPO_INFO),
                "nome_resp" => trim($info_pessoal->NOME_RESP),
                "telefone_resp" => trim($info_pessoal->NUM_RESP),
                "cpf_resp" => trim($info_pessoal->CPF_RESP),
                "parentesco" => trim($info_pessoal->PARENTESCO),
                "motivacao" => trim($voluntario->MOTIVACAO),
                "como_contr" => trim($voluntario->COMO_CONTR),
                "motivo_opcao" => trim($voluntario->MOTIVO_OPCAO),
                "exp_voluntario" => trim($voluntario->EXP_VOLUNTARIO),
                "ocupacao" => trim($voluntario->OCUPACAO),
                "disp_semanal" => trim($voluntario->DISP_SEMANAL),
                "rel_pes" => trim($voluntario->REL_PES),
                "estudante" => trim($voluntario->ESTUDANTE),
                "curso" => trim($voluntario->ID_CURSO),
                "fase" => trim($voluntario->FASE),
                "matricula" => trim($voluntario->MATRICULA),
                "atv_antiga" => $atv_antiga,
                "atv_atual" => $atv_atual,
                "setores" => $setores,
            );

            echo json_encode($info_voluntario);
        }

    }else{
        echo "_ERRO_";
    }

    $conexao->close();
?>