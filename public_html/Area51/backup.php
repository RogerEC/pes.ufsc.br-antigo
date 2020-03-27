<?php 
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $sexo = $_POST["sexo"];
    $rg = $_POST["rg"];
    $orgao_emissor = $_POST["orgao_emissor"];
    $uf_emissor = $_POST["uf_emissor"];
    $cpf = $_POST["cpf"];
    $data_nasc = $_POST["data_nasc"];
    $idade = $_POST["idade"];
    if(intval($idade) < 18){
        $nome_resp = $_POST["nome_resp"];
        $parentesco = $_POST["parentesco"];
        $cpf_resp = $_POST["cpf_resp"];
        $telefone_resp = $_POST["telefone_resp"];
    }
    $email = $_POST["email"];
    $telefone_cand = $_POST["telefone_cand"];
    $cep = $_POST["cep"];
    $tipo_endereco = $_POST["tipo_endereco"];
    if($tipo_endereco=="incompleto"){
        $endereco = $_POST["endereco"];
        $bairro = $_POST["bairro"];
    }
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $id_nome_escola = $_POST["nome_escola"];
    if($id_nome_escola=="novo"){
        $nome_escola = $_POST["nome_nova_escola"];
    }
    $cidade_escola = $_POST["cidade_escola"];
    $uf_escola = $_POST["uf_escola"];
    $tipo_aluno = $_POST["tipo_aluno"];
    if($tipo_aluno=="Aluno"){
        $matricula = $_POST["matricula"];
        $serie = $_POST["serie"];
        $turma = $_POST["turma"];
        $turno = $_POST["turno"];
    }else{
        $ano_conclusao = $_POST["ano_conclusao"];
    }
    $trabalho = $_POST["trabalho"];
    $periodo_trabalho = $_POST["periodo_trabalho"];
    $carga_horaria_trabalho = $_POST["carga_horaria_trabalho"];
    $rotina_estudo = $_POST["rotina_estudo"];
    $dias_estudo = $_POST["dias_estudo"];
    $tempo_estudo = $_POST["tempo_estudo"];//$ = $_POST[""];
    $origem_trajeto = $_POST["origem_trajeto"];
    $transporte = $_POST["transporte"];
    $tempo_trajeto = $_POST["tempo_trajeto"];
    //$ = $_POST[""];
    echo "SUCESSO";
?>