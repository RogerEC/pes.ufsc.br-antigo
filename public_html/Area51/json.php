<html>
    <head>
    <meta charset="utf-8">
    </head>
    <body>
    <?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path."/scripts/php/banco/conexao.php");

    //if(!empty($_POST["cpf"])){

        $cpf = '10118164902';//preg_replace('/[^0-9]/', '', $_POST["cpf"]);
        $consulta = $conexao->query("SELECT ID_USUARIO FROM pes_usuario WHERE USUARIO = '{$cpf}' LIMIT 1");
        if($consulta->num_rows == 0){
            echo "INEXISTENTE";
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
                "nome" => ($info_pessoal->NOME),
                "sobrenome" => ($info_pessoal->SOBRENOME),
                "sexo" => ($info_pessoal->GENERO),
                "cpf" => ($info_pessoal->CPF),
                "data_nasc" => ($info_pessoal->DATA_NASC),
                "idade" => ($info_pessoal->IDADE),
                "email" => ($info_pessoal->EMAIL),
                "telefone" => ($info_pessoal->NUM_WPP),
                "bairro" => ($endereco->BAIRRO),
                "cidade" => ($endereco->CIDADE),
                "estado" => ($endereco->ESTADO),
                "tipo_aluno" => ($tipo_aluno),
                "nome_escola" => ($aluno->NOME_ESCOLA),
                "localizacao" => ($aluno->LOCALIZACAO),
                "matricula" => ($aluno->NUM_MATRICULA),
                "serie" => ($aluno->SERIE),
                "turno" => ($aluno->TURNO_ESTUDO),
                "turma" => ($aluno->TURMA),
                "ano_conclusao" => ($aluno->ANO_CONCLUSAO),
                "rotina_estudo" => ($aluno->ROTINA_ESTUDO),
                "dias_estudo" => ($aluno->DIAS_ESTUDO),
                "tempo_estudo" => ($aluno->TEMPO_ESTUDO),
                "fez_vest" => ($aluno->FEZ_VEST),
                "curso" => $aluno->CURSO,
                "tipo_uni" => ($aluno->TIPO_UNI),
            );
            $infojson = json_encode($info_aluno);
            echo $infojson;
            echo "<br>";
            $var = json_decode($infojson);
            echo $var->curso;

        }

    //}else{
      //  echo "ERRO";
    //}

    $conexao->close();
?>
    </body>
</html>

