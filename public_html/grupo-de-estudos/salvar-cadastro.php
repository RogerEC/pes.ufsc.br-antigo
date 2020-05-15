<?php 
    if(!isset($_POST["cpf"]) || empty($_POST["cpf"])){
        echo "ERRO_GRAVE";
        exit;
    }
    if(!isset($_POST["email"]) || empty($_POST["email"])){
        echo "ERRO_GRAVE";
        exit;
    }

    $inscrito = (isset($_POST["inscrito"]))? intval($_POST["inscrito"]):0;
    $nome = (isset($_POST["nome"]))? $_POST["nome"]:null;
    $sobrenome = (isset($_POST["sobrenome"]))? $_POST["sobrenome"]:null;
    $sexo = (isset($_POST["sexo"]) && $_POST["sexo"]!="null")? $_POST["sexo"]:null;
    $cpf = (isset($_POST["cpf"]))? preg_replace('/[^0-9]/', '', $_POST["cpf"]):null;
    $data_nasc = (isset($_POST["data_nasc"]))? $_POST["data_nasc"]:null;
    $idade = (isset($_POST["idade"]) && !empty(isset($_POST["idade"])))? intval($_POST["idade"]):0;
    $email = (isset($_POST["email"]))? $_POST["email"]:null;
    $num_wpp = (isset($_POST["telefone"]))? preg_replace('/[^0-9]/', '', $_POST["telefone"]):null;
    $bairro = (isset($_POST["bairro"]))? $_POST["bairro"]:null;
    $cidade = (isset($_POST["cidade"]))? $_POST["cidade"]:null;
    $uf = (isset($_POST["uf"]))? $_POST["uf"]:null;
    $tipo_aluno = (isset($_POST["tipo_aluno"]))? $_POST["tipo_aluno"]:null;
    $tipo_escola = (isset($_POST["tipo_escola"]))? $_POST["tipo_escola"]:null;
    $nome_escola = (isset($_POST["nome_escola"]))? $_POST["nome_escola"]:null;
    $aux1 = (isset($_POST["cidade_escola"]))? $_POST["cidade_escola"]:null;
    $aux2 = (isset($_POST["uf_escola"]))? $_POST["uf_escola"]:null;
    $local_escola = $aux1." - ".$aux2;
    $matricula = (isset($_POST["matricula"]))? intval($_POST["matricula"]):0;
    $serie = (isset($_POST["serie"]) && $_POST["serie"]!="null")? $_POST["serie"]:null;
    $turma = (isset($_POST["turma"]))? $_POST["turma"]:null;
    $turno = (isset($_POST["turno"]) && $_POST["turno"]!="null")? $_POST["turno"]:null;
    $conclusao = (isset($_POST["ano_conclusao"]))? intval($_POST["ano_conclusao"]):0;
    $rotina_estudo = (isset($_POST["rotina_estudo"]) && $_POST["rotina_estudo"]!="null")? $_POST["rotina_estudo"]:null;
    $dias_estudo = (isset($_POST["dias_estudo"]) && $_POST["dias_estudo"]!="null")? $_POST["dias_estudo"]:null;
    $tempo_estudo = (isset($_POST["tempo_estudo"]) && $_POST["tempo_estudo"]!="null")? $_POST["tempo_estudo"]:null;
    $fez_vestibular = (isset($_POST["fez_vestibular"]) && $_POST["fez_vestibular"]!="null")? $_POST["fez_vestibular"]:null;
    $curso = (isset($_POST["curso"]) && $_POST["curso"]!="null")? $_POST["curso"]:null;
    $tipo_uni = (isset($_POST["tipo_universidade"]) && $_POST["tipo_universidade"]!="null")? $_POST["tipo_universidade"]:null;
    
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path."/scripts/php/banco/conexao.php");

    if($conexao->connect_error){
        echo "ERRO_GRAVE";
        exit;
    }

    $data = "STR_TO_DATE('$data_nasc','%d/%m/%Y')";
    $conexao->query("INSERT INTO COVID_CADASTRO_GEPES(NOME, SOBRENOME, SEXO, CPF, DATA_NASC, IDADE, EMAIL, NUM_WPP, BAIRRO, CIDADE, ESTADO, TIPO_ALUNO, TIPO_ESCOLA, NOME_ESCOLA, LOCALIZACAO, NUM_MATRICULA, SERIE, TURMA, TURNO_ESTUDO, ANO_CONCLUSAO, ROTINA_ESTUDO, DIAS_ESTUDO, TEMPO_ESTUDO, FEZ_VEST, CURSO, TIPO_UNI, DATA_REGISTRO, INSCRITO) VALUES('$nome', '$sobrenome', '$sexo', '$cpf', $data, $idade, '$email', '$num_wpp', '$bairro', '$cidade', '$uf', '$tipo_aluno', '$tipo_escola', '$nome_escola', '$local_escola', $matricula, '$serie', '$turma', '$turno', $conclusao, '$rotina_estudo', '$dias_estudo', '$tempo_estudo', '$fez_vestibular', '$curso', '$tipo_uni', NOW(), $inscrito)");
    
    require_once($path."/scripts/php/emails/Confirmacao-Grupo-Estudos-PES.php");
    echo "SUCESSO";
    $conexao->close();
?>