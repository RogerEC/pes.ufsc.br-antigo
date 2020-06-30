<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path."/scripts/php/banco/conexao.php");

    if(!empty($_POST["cpf"])){

        $cpf = preg_replace('/[^0-9]/', '', $_POST["cpf"]);
        $consulta = $conexao->query("SELECT ID_USUARIO FROM pes_usuario WHERE USUARIO = '{$cpf}' LIMIT 1");
        if($consulta->num_rows == 0){
            echo "ERRO";
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

            $info_aluno = array(
                "nome" => utf8_encode($info_pessoal->NOME),
                "sobrenome" => utf8_encode($info_pessoal->SOBRENOME),
                "sexo" => utf8_encode($info_pessoal->GENERO),
                "cpf" => utf8_encode($info_pessoal->CPF),
                "data_nasc" => utf8_encode($info_pessoal->DATA_NASC),
                "idade" => utf8_encode($info_pessoal->IDADE),
                "email" => utf8_encode($info_pessoal->EMAIL),
                "telefone" => utf8_encode($info_pessoal->NUM_WPP),
                "bairro" => utf8_encode($endereco->BAIRRO),
                "cidade" => utf8_encode($endereco->CIDADE),
                "estado" => utf8_encode($endereco->ESTADO),
                "tipo_aluno" => utf8_encode($tipo_aluno),
                "nome_escola" => utf8_encode($aluno->NOME_ESCOLA),
                "localizacao" => utf8_encode($aluno->LOCALIZACAO),
                "matricula" => utf8_encode($aluno->NUM_MATRICULA),
                "serie" => utf8_encode($aluno->SERIE),
                "turno" => utf8_encode($aluno->TURNO_ESTUDO),
                "turma" => utf8_encode($aluno->TURMA),
                "ano_conclusao" => utf8_encode($aluno->ANO_CONCLUSAO),
                "rotina_estudo" => utf8_encode($aluno->ROTINA_ESTUDO),
                "dias_estudo" => utf8_encode($aluno->DIAS_ESTUDO),
                "tempo_estudo" => utf8_encode($aluno->TEMPO_ESTUDO),
                "fez_vest" => utf8_encode($aluno->FEZ_VEST),
                "curso" => utf8_encode($aluno->CURSO),
                "tipo_uni" => utf8_encode($aluno->TIPO_UNI),
            );

            echo json_encode($info_aluno);
        }

    }else{
        echo "ERRO";
    }

    $conexao->close();
?>
