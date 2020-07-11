<?php 
    if(!isset($_POST["cpf"]) || empty($_POST["cpf"])){
        echo "ERRO_GRAVE";
        exit;
    }
    if(!isset($_POST["email"]) || empty($_POST["email"])){
        echo "ERRO_GRAVE";
        exit;
    }
    $versao_ps = "2020-2";
    $inscrito = (isset($_POST["inscrito"]))? intval($_POST["inscrito"]):0;
    $nome = (isset($_POST["nome"]))? trim($_POST["nome"]):null;
    $sobrenome = (isset($_POST["sobrenome"]))? trim($_POST["sobrenome"]):null;
    $sexo = (isset($_POST["sexo"]) && $_POST["sexo"]!="null")? trim($_POST["sexo"]):null;
    $cpf = (isset($_POST["cpf"]))? preg_replace('/[^0-9]/', '', $_POST["cpf"]):null;
    $data_nasc = (isset($_POST["data_nasc"]))? trim($_POST["data_nasc"]):null;
    $idade = (isset($_POST["idade"]) && !empty(isset($_POST["idade"])))? intval($_POST["idade"]):0;
    $email = (isset($_POST["email"]))? trim($_POST["email"]):null;
    $num_wpp = (isset($_POST["telefone"]))? preg_replace('/[^0-9]/', '', $_POST["telefone"]):null;
    $bairro = (isset($_POST["bairro"]))? trim($_POST["bairro"]):null;
    $cidade = (isset($_POST["cidade"]))? trim($_POST["cidade"]):null;
    $uf = (isset($_POST["uf"]))? trim($_POST["uf"]):null;
    $tipo_aluno = (isset($_POST["tipo_aluno"]))? trim($_POST["tipo_aluno"]):null;
    $tipo_escola = (isset($_POST["tipo_escola"]))? trim($_POST["tipo_escola"]):null;
    $nome_escola = (isset($_POST["nome_escola"]))? trim($_POST["nome_escola"]):null;
    $aux1 = (isset($_POST["cidade_escola"]))? trim($_POST["cidade_escola"]):null;
    $aux2 = (isset($_POST["uf_escola"]))? trim($_POST["uf_escola"]):null;
    $local_escola = $aux1." - ".$aux2;
    $matricula = (isset($_POST["matricula"]))? intval($_POST["matricula"]):0;
    $serie = (isset($_POST["serie"]) && $_POST["serie"]!="null")? trim($_POST["serie"]):null;
    $turma = (isset($_POST["turma"]))? trim($_POST["turma"]):null;
    $turno = (isset($_POST["turno"]) && $_POST["turno"]!="null")? trim($_POST["turno"]):null;
    $conclusao = (isset($_POST["ano_conclusao"]))? intval($_POST["ano_conclusao"]):0;
    $rotina_estudo = (isset($_POST["rotina_estudo"]) && $_POST["rotina_estudo"]!="null")? trim($_POST["rotina_estudo"]):null;
    $dias_estudo = (isset($_POST["dias_estudo"]) && $_POST["dias_estudo"]!="null")? trim($_POST["dias_estudo"]):null;
    $tempo_estudo = (isset($_POST["tempo_estudo"]) && $_POST["tempo_estudo"]!="null")? trim($_POST["tempo_estudo"]):null;
    $fez_vestibular = (isset($_POST["fez_vestibular"]) && $_POST["fez_vestibular"]!="null")? trim($_POST["fez_vestibular"]):null;
    $curso = (isset($_POST["curso"]) && $_POST["curso"]!="null")? trim($_POST["curso"]):null;
    $tipo_uni = (isset($_POST["tipo_universidade"]) && $_POST["tipo_universidade"]!="null")? trim($_POST["tipo_universidade"]):null;
    $escola_quarentena = (isset($_POST["escola_quarentena"]) && $_POST["escola_quarentena"]!="null")? trim($_POST["escola_quarentena"]):null;
    $trabalho = (isset($_POST["trabalho"]) && $_POST["trabalho"]!="null")? trim($_POST["trabalho"]):null;
    $periodo_trabalho = (isset($_POST["periodo_trabalho"]) && $_POST["periodo_trabalho"]!="null")? trim($_POST["periodo_trabalho"]):null;
    $ch_trab = (isset($_POST["carga_horaria_trabalho"]) && $_POST["carga_horaria_trabalho"]!="null")? trim($_POST["carga_horaria_trabalho"]):null;
    $trab_quarentena = (isset($_POST["trabalho_quarentena"]) && $_POST["trabalho_quarentena"]!="null")? trim($_POST["trabalho_quarentena"]):null;
    $disp_banda_larga = (isset($_POST["disp_banda_larga"]) && $_POST["disp_banda_larga"]!="null")? trim($_POST["disp_banda_larga"]):null;
    $tipo_dispositivo = (isset($_POST["tipo_dispositivo"]) && $_POST["tipo_dispositivo"]!="null")? trim($_POST["tipo_dispositivo"]):null;
    $velocidade_conexao = (isset($_POST["velocidade_conexao"]) && $_POST["velocidade_conexao"]!="null")? trim($_POST["velocidade_conexao"]):null;
    $material_fisico = (isset($_POST["material_fisico"]) && $_POST["material_fisico"]!="null")? trim($_POST["material_fisico"]):null;
    
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path."/scripts/php/banco/conexao.php");

    if($conexao->connect_error){
        echo "ERRO_GRAVE";
        exit;
    }

    $data = "STR_TO_DATE('$data_nasc','%d/%m/%Y')";
    $conexao->query("INSERT INTO COVID_CADASTRO_GEPES(NOME, SOBRENOME, SEXO, CPF, DATA_NASC, IDADE, EMAIL, NUM_WPP, BAIRRO, CIDADE, ESTADO, TIPO_ALUNO, TIPO_ESCOLA, NOME_ESCOLA, LOCALIZACAO, NUM_MATRICULA, SERIE, TURMA, TURNO_ESTUDO, ANO_CONCLUSAO, ROTINA_ESTUDO, DIAS_ESTUDO, TEMPO_ESTUDO, FEZ_VEST, CURSO, TIPO_UNI, DATA_REGISTRO, INSCRITO, ESCOLA_QUARENTENA, TRABALHO, PERIODO_TRABALHO, CARGA_HORARIA_TRABALHO, TRABALHO_QUARENTENA, DISPO_BANDA_LARGA, TIPO_DISPOSITIVO, VELOCIDADE_CONEXAO, MATERIAL_FISICO, VERSAO_PS) VALUES('$nome', '$sobrenome', '$sexo', '$cpf', $data, $idade, '$email', '$num_wpp', '$bairro', '$cidade', '$uf', '$tipo_aluno', '$tipo_escola', '$nome_escola', '$local_escola', $matricula, '$serie', '$turma', '$turno', $conclusao, '$rotina_estudo', '$dias_estudo', '$tempo_estudo', '$fez_vestibular', '$curso', '$tipo_uni', NOW(), $inscrito, '$escola_quarentena', '$trabalho', '$periodo_trabalho', '$ch_trab', '$trab_quarentena', '$disp_banda_larga', '$tipo_dispositivo', '$velocidade_conexao', '$material_fisico', '$versao_ps')");
    
    require_once($path."/scripts/php/emails/Confirmacao-Grupo-Estudos-PES.php");
    echo "SUCESSO";
    $conexao->close();
?>