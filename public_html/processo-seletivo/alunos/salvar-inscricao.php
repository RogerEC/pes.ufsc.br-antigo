<?php 
    if(!isset($_POST["cpf"]) || empty($_POST["cpf"])){
        echo "ERRO_GRAVE";
        exit;
    }
    if(!isset($_POST["senha"]) || empty($_POST["senha"])){
        echo "ERRO_GRAVE";
        exit;
    }
    if(!isset($_POST["email"]) || empty($_POST["email"])){
        echo "ERRO_GRAVE";
        exit;
    }

    $disp = array();//disponibilidade
    $proj_atu = array();//nome projetos atuais
    $CH_proj = array();// carga horaria projeto atual
    $proj_ant = array();//nome projeto antigo
    $prof_proj = array();//prof responsavel projeto antigo
    $divulgacao = array();//pesquisa divulgacao

    $senha = (isset($_POST["senha"]))? $_POST["senha"]:null;
    $nome = (isset($_POST["nome"]))? $_POST["nome"]:null;
    $sobrenome = (isset($_POST["sobrenome"]))? $_POST["sobrenome"]:null;
    $sexo = (isset($_POST["sexo"]) && $_POST["sexo"]!="null")? $_POST["sexo"]:null;
    $rg = (isset($_POST["rg"]))? $_POST["rg"]:null;
    $aux1 = (isset($_POST["orgao_emissor"]) && $_POST["orgao_emissor"]!="null")? $_POST["orgao_emissor"]:null;
    $aux2 = (isset($_POST["uf_emissor"]) && $_POST["uf_emissor"]!="null")? $_POST["uf_emissor"]:null;
    $orgao_emissor = $aux1."/".$aux2;
    $cpf = (isset($_POST["cpf"]))? preg_replace('/[^0-9]/', '', $_POST["cpf"]):null;
    $data_nasc = (isset($_POST["data_nasc"]))? $_POST["data_nasc"]:null;
    $idade = (isset($_POST["idade"]) && !empty(isset($_POST["idade"])))? intval($_POST["idade"]):0;
    $nome_resp = (isset($_POST["nome_resp"]))? $_POST["nome_resp"]:null;
    $parentesco = (isset($_POST["parentesco"]) && $_POST["parentesco"]!="null")? $_POST["parentesco"]:null;
    $cpf_resp = (isset($_POST["cpf_resp"]))? preg_replace('/[^0-9]/', '', $_POST["cpf_resp"]):null;
    $num_resp = (isset($_POST["telefone_resp"]))? preg_replace('/[^0-9]/', '', $_POST["telefone_resp"]):null;
    $email = (isset($_POST["email"]))? $_POST["email"]:null;
    $num_wpp = (isset($_POST["telefone_cand"]))? preg_replace('/[^0-9]/', '', $_POST["telefone_cand"]):null;
    $cep = (isset($_POST["cep"]))? intval(preg_replace('/[^0-9]/', '', $_POST["cep"])):0;
    $rua = (isset($_POST["endereco"]))? $_POST["endereco"]:null;
    $numero = (isset($_POST["numero"]))? intval($_POST["numero"]):0;
    $complemento = (isset($_POST["complemento"]))? $_POST["complemento"]:null;
    $bairro = (isset($_POST["bairro"]))? $_POST["bairro"]:null;
    $cidade = (isset($_POST["cidade"]))? $_POST["cidade"]:null;
    $uf = (isset($_POST["uf"]))? $_POST["uf"]:null;
    $estudante = (isset($_POST["candidato_estudante"]) && $_POST["candidato_estudante"]=="on")? 1:0;
    $nome_escola = (isset($_POST["nome_escola"]) && $_POST["nome_escola"]!="null")? $_POST["nome_escola"]:null;
    if($nome_escola=="novo"){
        $nome_escola = (isset($_POST["nome_nova_escola"]))? $_POST["nome_nova_escola"]:null;
    }
    $aux3 = (isset($_POST["cidade_escola"]))? $_POST["cidade_escola"]:null;
    $aux4 = (isset($_POST["uf_escola"]))? $_POST["uf_escola"]:null;
    $local_escola = $aux3." - ".$aux4;
    $matricula = (isset($_POST["matricula"]))? intval($_POST["matricula"]):0;
    $serie = (isset($_POST["serie"]) && $_POST["serie"]!="null")? $_POST["serie"]:null;
    $turma = (isset($_POST["turma"]))? $_POST["turma"]:null;
    $turno = (isset($_POST["turno"]) && $_POST["turno"]!="null")? $_POST["turno"]:null;
    $conclusao = (isset($_POST["ano_conclusao"]))? intval($_POST["ano_conclusao"]):0;
    $trabalho = (isset($_POST["trabalho"]) && $_POST["trabalho"]!="null")? $_POST["trabalho"]:null;
    $periodo_trabalho = (isset($_POST["periodo_trabalho"]) && $_POST["periodo_trabalho"]!="null")? $_POST["periodo_trabalho"]:null;
    $ch_trabalho = (isset($_POST["carga_horaria_trabalho"]) && $_POST["carga_horaria_trabalho"]!="null")? $_POST["carga_horaria_trabalho"]:null;
    $rotina_estudo = (isset($_POST["rotina_estudo"]) && $_POST["rotina_estudo"]!="null")? $_POST["rotina_estudo"]:null;
    $dias_estudo = (isset($_POST["dias_estudo"]) && $_POST["dias_estudo"]!="null")? $_POST["dias_estudo"]:null;
    $tempo_estudo = (isset($_POST["tempo_estudo"]) && $_POST["tempo_estudo"]!="null")? $_POST["tempo_estudo"]:null;
    $origem_trajeto = (isset($_POST["origem_trajeto"]) && $_POST["origem_trajeto"]!="null")? $_POST["origem_trajeto"]:null;
    $transporte = (isset($_POST["transporte"]) && $_POST["transporte"]!="null")? $_POST["transporte"]:null;
    $tempo_trajeto = (isset($_POST["tempo_trajeto"]) && $_POST["tempo_trajeto"]!="null")? $_POST["tempo_trajeto"]:null;
    $fez_vestibular = (isset($_POST["fez_vestibular"]) && $_POST["fez_vestibular"]!="null")? $_POST["fez_vestibular"]:null;
    $curso = (isset($_POST["curso"]) && $_POST["curso"]!="null")? $_POST["curso"]:null;
    $tipo_uni = (isset($_POST["tipo_universidade"]) && $_POST["tipo_universidade"]!="null")? $_POST["tipo_universidade"]:null;
    $divulgacao[1] = (isset($_POST["divulgacao_instagram"]) && $_POST["divulgacao_instagram"]=="on")? true:false;
    $divulgacao[2] = (isset($_POST["divulgacao_facebook"]) && $_POST["divulgacao_facebook"]=="on")? true:false;
    $divulgacao[4] = (isset($_POST["divulgacao_cartaz"]) && $_POST["divulgacao_cartaz"]=="on")? true:false;
    $divulgacao[12] = (isset($_POST["divulgacao_escola"]) && $_POST["divulgacao_escola"]=="on")? true:false;
    $divulgacao[11] = (isset($_POST["divulgacao_revista"]) && $_POST["divulgacao_revista"]=="on")? true:false;
    $divulgacao[7] = (isset($_POST["divulgacao_amigo_familiar"]) && $_POST["divulgacao_amigo_familiar"]=="on")? true:false;
    $divulgacao[8] = (isset($_POST["divulgacao_tv"]) && $_POST["divulgacao_tv"]=="on")? true:false;
    $divulgacao[10] = (isset($_POST["divulgacao_jornal"]) && $_POST["divulgacao_jornal"]=="on")? true:false;
    $divulgacao[9] = (isset($_POST["divulgacao_radio"]) && $_POST["divulgacao_radio"]=="on")? true:false;
    $divulgacao[13] = (isset($_POST["divulgacao_outro"]) && $_POST["divulgacao_outro"]=="on")? true:false;
    
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path."/scripts/php/banco/conexao.php");

    if($conexao->connect_error){
        echo "ERRO_GRAVE";
        exit;
    }

    $conexao->query("INSERT INTO pes_usuario(TIPO, USUARIO, SENHA) VALUES('A', '$cpf', '$senha')");
    $id_usuario = $conexao->insert_id;
    $conexao->query("INSERT INTO pes_endereco(CEP, RUA, NUMERO, COMPLEMENTO, BAIRRO, CIDADE, ESTADO) VALUES ($cep, '$rua', $numero, '$complemento', '$bairro', '$cidade', '$uf')");
    $id_endereco = $conexao->insert_id;
    echo "INSERT INTO pes_aluno(TRABALHO, PERIODO_OCUPACAO, CARGA_HORARIA, ROTINA_ESTUDO, DIAS_ESTUDO, TEMPO_ESTUDO, ORIGEM_TRAJ, TRANSPORTE, TEMPO_TRAJETO, FEZ_VEST, CURSO, TIPO_UNI, ESTUDANTE, NUM_MATRICULA, SERIE, TURMA, TURNO_ESTUDO, ANO_CONCLUSAO, NOME_ESCOLA, LOCALIZACAO, CONFIRMADO, ID_USUARIO, DATA_REGISTRO) VALUES('$trabalho', '$periodo_trabalho', '$ch_trabalho', '$rotina_estudo', '$dias_estudo', '$tempo_estudo', '$origem_trajeto', '$transporte', '$tempo_trajeto', '$fez_vestibular', '$curso', '$tipo_uni', $estudante, $matricula, '$serie', '$turma', '$turno', $conclusao, '$nome_escola', '$local_escola', 0, $id_usuario, NOW())";
    $conexao->query("INSERT INTO pes_aluno(TRABALHO, PERIODO_OCUPACAO, CARGA_HORARIA, ROTINA_ESTUDO, DIAS_ESTUDO, TEMPO_ESTUDO, ORIGEM_TRAJ, TRANSPORTE, TEMPO_TRAJETO, FEZ_VEST, CURSO, TIPO_UNI, ESTUDANTE, NUM_MATRICULA, SERIE, TURMA, TURNO_ESTUDO, ANO_CONCLUSAO, NOME_ESCOLA, LOCALIZACAO, CONFIRMADO, ID_USUARIO, DATA_REGISTRO) VALUES('$trabalho', '$periodo_trabalho', '$ch_trabalho', '$rotina_estudo', '$dias_estudo', '$tempo_estudo', '$origem_trajeto', '$transporte', '$tempo_trajeto', '$fez_vestibular', '$curso', '$tipo_uni', $estudante, $matricula, '$serie', '$turma', '$turno', $conclusao, '$nome_escola', '$local_escola', 0, $id_usuario, NOW())");
    $id_aluno = $conexao->insert_id;
    $data = "STR_TO_DATE('$data_nasc','%d/%m/%Y')";
    $conexao->query("INSERT INTO pes_info_pessoal(NOME, SOBRENOME, EMAIL, NUM_WPP, CPF, DATA_NASC, IDADE, GENERO, NOME_RESP, NUM_RESP, CPF_RESP, PARENTESCO, TIPO_INFO, ID_ALUNO, ID_USUARIO, N_RG, ORG_EMIS, ID_ENDERECO) VALUES('$nome', '$sobrenome', '$email', '$num_wpp', '$cpf', $data, $idade, '$sexo', '$nome_resp', '$num_resp', '$cpf_resp', '$parentesco', 'A', $id_aluno, $id_usuario, '$rg', '$orgao_emissor', $id_endereco)");
    
    if(!empty($divulgacao)){
        foreach($divulgacao as $chave => $valor){
            if($valor){
                $conexao->query("INSERT INTO pes_divulg_aluno(ID_DIVULG, ID_ALUNO) VALUES($chave, $id_aluno)");
            }
        }
    }
    
    require_once($path."/scripts/php/emails/Confirmacao-PS-Alunos.php");
    echo "SUCESSO";
    $conexao->close();
?>