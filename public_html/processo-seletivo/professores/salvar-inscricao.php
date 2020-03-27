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
    $cpf = (isset($_POST["cpf"]))? preg_replace('/[^0-9]/', '', $_POST["cpf"]):null;
    $data_nasc = (isset($_POST["data_nasc"]))? $_POST["data_nasc"]:null;
    $idade = (isset($_POST["idade"]))? intval($_POST["idade"]):0;
    $nome_resp = (isset($_POST["nome_resp"]))? $_POST["nome_resp"]:null;
    $parentesco = (isset($_POST["parentesco"]) && $_POST["parentesco"]!="null")? $_POST["parentesco"]:null;
    $cpf_resp = (isset($_POST["cpf_resp"]))? preg_replace('/[^0-9]/', '', $_POST["cpf_resp"]):null;
    $num_resp = (isset($_POST["telefone_resp"]))? preg_replace('/[^0-9]/', '', $_POST["telefone_resp"]):null;
    $email = (isset($_POST["email"]))? $_POST["email"]:null;
    $num_wpp = (isset($_POST["telefone_cand"]))? preg_replace('/[^0-9]/', '', $_POST["telefone_cand"]):null;
    $materia01 = (isset($_POST["materia01"]) && $_POST["materia01"]!="null")? intval($_POST["materia01"]):null;
    $materia02 = (isset($_POST["materia02"]) && $_POST["materia02"]!="null")? intval($_POST["materia02"]):null;
    $materia03 = (isset($_POST["materia03"]) && $_POST["materia03"]!="null")? intval($_POST["materia03"]):null;
    $materia_especifica = (isset($_POST["materia_especifica"]))? $_POST["materia_especifica"]:null;
    $porque_entrar = (isset($_POST["porque_entrar"]))? $_POST["porque_entrar"]:null;
    $como_ajudar = (isset($_POST["como_ajudar"]))? $_POST["como_ajudar"]:null;
    $porque_educacao = (isset($_POST["porque_educacao"]))? $_POST["porque_educacao"]:null;
    $quantas_horas = (isset($_POST["quantas_horas"]))? $_POST["quantas_horas"]:null;
    $disp[1] = (isset($_POST["SEG1"]) && $_POST["SEG1"]=="Disponível")? true:false;
    $disp[2] = (isset($_POST["SEG2"]) && $_POST["SEG2"]=="Disponível")? true:false;
    $disp[3] = (isset($_POST["SEG3"]) && $_POST["SEG3"]=="Disponível")? true:false;
    $disp[4] = (isset($_POST["SEG4"]) && $_POST["SEG4"]=="Disponível")? true:false;
    $disp[5] = (isset($_POST["TER1"]) && $_POST["TER1"]=="Disponível")? true:false;
    $disp[6] = (isset($_POST["TER2"]) && $_POST["TER2"]=="Disponível")? true:false;
    $disp[7] = (isset($_POST["TER3"]) && $_POST["TER3"]=="Disponível")? true:false;
    $disp[8] = (isset($_POST["TER4"]) && $_POST["TER4"]=="Disponível")? true:false;
    $disp[9] = (isset($_POST["QUA1"]) && $_POST["QUA1"]=="Disponível")? true:false;
    $disp[10] = (isset($_POST["QUA2"]) && $_POST["QUA2"]=="Disponível")? true:false;
    $disp[11] = (isset($_POST["QUA3"]) && $_POST["QUA3"]=="Disponível")? true:false;
    $disp[12] = (isset($_POST["QUA4"]) && $_POST["QUA4"]=="Disponível")? true:false;
    $disp[13] = (isset($_POST["QUI1"]) && $_POST["QUI1"]=="Disponível")? true:false;
    $disp[14] = (isset($_POST["QUI2"]) && $_POST["QUI2"]=="Disponível")? true:false;
    $disp[15] = (isset($_POST["QUI3"]) && $_POST["QUI3"]=="Disponível")? true:false;
    $disp[16] = (isset($_POST["QUI4"]) && $_POST["QUI4"]=="Disponível")? true:false;
    $disp[17] = (isset($_POST["SEX1"]) && $_POST["SEX1"]=="Disponível")? true:false;
    $disp[18] = (isset($_POST["SEX2"]) && $_POST["SEX2"]=="Disponível")? true:false;
    $disp[19] = (isset($_POST["SEX3"]) && $_POST["SEX3"]=="Disponível")? true:false;
    $disp[20] = (isset($_POST["SEX4"]) && $_POST["SEX4"]=="Disponível")? true:false;
    $relacao_cursinho = (isset($_POST["relacao_cursinho"]))? $_POST["relacao_cursinho"]:null;
    $ocupacao = (isset($_POST["ocupacao"]))? $_POST["ocupacao"]:null;
    $curso = (isset($_POST["curso"]) && $_POST["curso"]!="null")? intval($_POST["curso"]):0;
    $fase = (isset($_POST["fase"]) && !empty($_POST["fase"]))? intval($_POST["fase"]):0;
    $matricula = (isset($_POST["matricula"]) && !empty($_POST["matricula"]))? intval($_POST["matricula"]):0;
    $projetos_atuais = (isset($_POST["outros_projetos"]) && $_POST["outros_projetos"]=="Sim")? true:false;
    $proj_atu[0] = (isset($_POST["nome_projeto0"]))? $_POST["nome_projeto0"]:null;
    $proj_atu[1] = (isset($_POST["nome_projeto1"]))? $_POST["nome_projeto1"]:null;
    $proj_atu[2] = (isset($_POST["nome_projeto2"]))? $_POST["nome_projeto2"]:null;
    $proj_atu[3] = (isset($_POST["nome_projeto3"]))? $_POST["nome_projeto3"]:null;
    $proj_atu[4] = (isset($_POST["nome_projeto4"]))? $_POST["nome_projeto4"]:null;
    $CH_proj[0] = (isset($_POST["carga_horaria_projeto0"]))? intval($_POST["carga_horaria_projeto0"]):null;
    $CH_proj[1] = (isset($_POST["carga_horaria_projeto1"]))? intval($_POST["carga_horaria_projeto1"]):null;
    $CH_proj[2] = (isset($_POST["carga_horaria_projeto2"]))? intval($_POST["carga_horaria_projeto2"]):null;
    $CH_proj[3] = (isset($_POST["carga_horaria_projeto3"]))? intval($_POST["carga_horaria_projeto3"]):null;
    $CH_proj[4] = (isset($_POST["carga_horaria_projeto4"]))? intval($_POST["carga_horaria_projeto4"]):null;
    $projetos_antigo = (isset($_POST["outros_projetos_antigo"]) && $_POST["outros_projetos_antigo"]=="Sim")? true:false;
    $proj_ant[0] = (isset($_POST["nome_projeto_antigo0"]))? $_POST["nome_projeto_antigo0"]:null;
    $proj_ant[1] = (isset($_POST["nome_projeto_antigo1"]))? $_POST["nome_projeto_antigo1"]:null;
    $proj_ant[2] = (isset($_POST["nome_projeto_antigo2"]))? $_POST["nome_projeto_antigo2"]:null;
    $proj_ant[3] = (isset($_POST["nome_projeto_antigo3"]))? $_POST["nome_projeto_antigo3"]:null;
    $proj_ant[4] = (isset($_POST["nome_projeto_antigo4"]))? $_POST["nome_projeto_antigo4"]:null;
    $prof_proj[0] = (isset($_POST["prof_projeto_antigo0"]))? $_POST["prof_projeto_antigo0"]:null;
    $prof_proj[1] = (isset($_POST["prof_projeto_antigo1"]))? $_POST["prof_projeto_antigo1"]:null;
    $prof_proj[2] = (isset($_POST["prof_projeto_antigo2"]))? $_POST["prof_projeto_antigo2"]:null;
    $prof_proj[3] = (isset($_POST["prof_projeto_antigo3"]))? $_POST["prof_projeto_antigo3"]:null;
    $prof_proj[4] = (isset($_POST["prof_projeto_antigo4"]))? $_POST["prof_projeto_antigo4"]:null;
    $voluntario = (isset($_POST["voluntario"]) && $_POST["voluntario"]=="Sim")? true:false;
    $exp_voluntario = (isset($_POST["exp_voluntario"]))? $_POST["exp_voluntario"]:null;
    $divulgacao[1] = (isset($_POST["divulgacao_instagram"]) && $_POST["divulgacao_instagram"]=="on")? true:false;
    $divulgacao[2] = (isset($_POST["divulgacao_facebook"]) && $_POST["divulgacao_facebook"]=="on")? true:false;
    $divulgacao[4] = (isset($_POST["divulgacao_cartaz"]) && $_POST["divulgacao_cartaz"]=="on")? true:false;
    $divulgacao[6] = (isset($_POST["divulgacao_sala"]) && $_POST["divulgacao_sala"]=="on")? true:false;
    $divulgacao[3] = (isset($_POST["divulgacao_email"]) && $_POST["divulgacao_email"]=="on")? true:false;
    $divulgacao[7] = (isset($_POST["divulgacao_amigo_familiar"]) && $_POST["divulgacao_amigo_familiar"]=="on")? true:false;
    $divulgacao[5] = (isset($_POST["divulgacao_hall"]) && $_POST["divulgacao_hall"]=="on")? true:false;
    $divulgacao[13] = (isset($_POST["divulgacao_outro"]) && $_POST["divulgacao_outro"]=="on")? true:false;
    
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path."/scripts/php/banco/conexao.php");

    if($conexao->connect_error){
        echo "ERRO_GRAVE";
        exit;
    }

    $conexao->query("INSERT INTO pes_usuario(TIPO, USUARIO, SENHA) VALUES('P', '$cpf', '$senha')");
    $id_usuario = $conexao->insert_id;
    if(isset($_POST["curso"]) && !empty($_POST["curso"])){
        $estudante = 1;
    }else{
        $estudante = 0;
    }
    $conexao->query("INSERT INTO pes_volunt(CONFIRMADO, CONTRATADO, MOTIVACAO, COMO_CONTR, MOTIVO_OPCAO, MOTIVO_EDUCACAO, EXP_VOLUNTARIO, ESTUDANTE, OCUPACAO, TIPO_VOLUNTARIO, DISP_SEMANAL, REL_PES, FASE, MATRICULA, ID_CURSO, ID_USUARIO) VALUES(0, 0, '$porque_entrar', '$como_ajudar', '$materia_especifica', '$porque_educacao', '$exp_voluntario', $estudante, '$ocupacao', 'P', '$quantas_horas', '$relacao_cursinho', $fase, $matricula, $curso, $id_usuario)");
    $id_volunt = $conexao->insert_id;
    $data = "STR_TO_DATE('$data_nasc','%d/%m/%Y')";
    $conexao->query("INSERT INTO pes_info_pessoal(NOME, SOBRENOME, EMAIL, NUM_WPP, CPF, DATA_NASC, IDADE, GENERO, NOME_RESP, NUM_RESP, CPF_RESP, PARENTESCO, TIPO_INFO, ID_VOLUNT, ID_USUARIO) VALUES('$nome', '$sobrenome', '$email', '$num_wpp', '$cpf', $data, $idade, '$sexo', '$nome_resp', '$num_resp', '$cpf_resp', '$parentesco', 'P', $id_volunt, $id_usuario)");
    
    if(!empty($materia01)){
        $conexao->query("INSERT INTO pes_disciplina_prof(ID_DISCIPLINA, ID_VOLUNT, OPCAO) VALUES($materia01, $id_volunt, 1)");
    }
    if(!empty($materia02)){
        $conexao->query("INSERT INTO pes_disciplina_prof(ID_DISCIPLINA, ID_VOLUNT, OPCAO) VALUES($materia02, $id_volunt, 2)");
    }
    if(!empty($materia03)){
        $conexao->query("INSERT INTO pes_disciplina_prof(ID_DISCIPLINA, ID_VOLUNT, OPCAO) VALUES($materia03, $id_volunt, 3)");
    }
    if($projetos_atuais){
        for($i=0; $i<5; $i++){
            if(!empty($proj_atu[$i]) && !empty($CH_proj[$i])){
                $conexao->query("INSERT INTO pes_atividade_atual(NOME, CARGA_HORARIA) VALUES('$proj_atu[$i]', $CH_proj[$i])");
                $id_atv = $conexao->insert_id;
                $conexao->query("INSERT INTO pes_atividade_atual_voluntario(ID_ATIVIDADE, ID_VOLUNT) VALUES($id_atv, $id_volunt)");
            }
        }
    }
    if($projetos_antigo){
        for($i=0; $i<5; $i++){
            if(!empty($proj_ant[$i])){
                $conexao->query("INSERT INTO pes_atividade_antiga(NOME, NOME_PROF) VALUES('$proj_ant[$i]', '$prof_proj[$i]')");
                $id_atv = $conexao->insert_id;
                $conexao->query("INSERT INTO pes_atividade_antiga_voluntario(ID_ATIVIDADE_ANTIGA, ID_VOLUNT) VALUES($id_atv, $id_volunt)");
            }
        }
    }
    if(!empty($divulgacao)){
        foreach($divulgacao as $chave => $valor){
            if($valor){
                $conexao->query("INSERT INTO pes_divulg_volunt(ID_DIVULG, ID_VOLUNT) VALUES($chave, $id_volunt)");
            }
        }
    }
    for($i=1; $i<21; $i++){
        if($disp[$i]){
            $conexao->query("INSERT INTO pes_disp_dia_prof(ID_DISP_DIA, ID_VOLUNT) VALUES($i, $id_volunt)");
        }
    }
    $nomePS = "de Professores 2020";
    //require_once($path."/scripts/php/emails/Confirmacao-PS-Profs-Gestao.php");
    echo "SUCESSO";
    $conexao->close();
?>