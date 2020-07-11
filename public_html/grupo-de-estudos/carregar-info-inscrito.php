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
            $id_aluno = $info_pessoal->ID_ALUNO;
            $id_endereco = $info_pessoal->ID_ENDERECO;
            $consulta = $conexao->query("SELECT * FROM pes_aluno WHERE ID_ALUNO = $id_aluno");
            $aluno = $consulta->fetch_object();
            $consulta = $conexao->query("SELECT * FROM pes_endereco WHERE ID_ENDERECO = $id_endereco");
            $endereco = $consulta->fetch_object();

            if($aluno->ESTUDANTE == 1){
                $tipo_aluno = "Está cursando o ensino médio";
            }else{
                $tipo_aluno = "Já concluiu o ensino médio";
            }

            $data_nasc = DateTime::createFromFormat('Y-m-d', trim($info_pessoal->DATA_NASC), $timezone);
            $localizacao = explode('-',trim($aluno->LOCALIZACAO));

            $info_aluno = array(
                "nome" => trim($info_pessoal->NOME),
                "sobrenome" => trim($info_pessoal->SOBRENOME),
                "sexo" => trim($info_pessoal->GENERO),
                "data_nasc" => $data_nasc->format('d/m/Y'),
                "email" => trim($info_pessoal->EMAIL),
                "telefone" => trim($info_pessoal->NUM_WPP),
                "bairro" => trim($endereco->BAIRRO),
                "cidade" => trim($endereco->CIDADE),
                "estado" => trim($endereco->ESTADO),
                "tipo_aluno" => trim($tipo_aluno),
                "nome_escola" => trim($aluno->NOME_ESCOLA),
                "cidade_escola" => trim($localizacao[0]),
                "uf_escola" => trim($localizacao[1]),
                "matricula" => trim($aluno->NUM_MATRICULA),
                "serie" => trim($aluno->SERIE),
                "turno" => trim($aluno->TURNO_ESTUDO),
                "turma" => trim($aluno->TURMA),
                "ano_conclusao" => trim($aluno->ANO_CONCLUSAO),
                "rotina_estudo" => trim($aluno->ROTINA_ESTUDO),
                "dias_estudo" => trim($aluno->DIAS_ESTUDO),
                "tempo_estudo" => trim($aluno->TEMPO_ESTUDO),
                "fez_vest" => trim($aluno->FEZ_VEST),
                "curso" => trim($aluno->CURSO),
                "tipo_uni" => trim($aluno->TIPO_UNI),
                "trabalho" => trim($aluno->TRABALHO),
                "periodo_ocupacao" => trim($aluno->PERIODO_OCUPACAO),
                "carga_horaria_trabalho" => trim($aluno->CARGA_HORARIA)
            );

            echo json_encode($info_aluno);
        }

    }else{
        echo "_ERRO_";
    }

    $conexao->close();
?>