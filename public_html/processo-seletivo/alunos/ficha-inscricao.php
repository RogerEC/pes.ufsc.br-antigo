<?php
    ini_set('default_charset','utf-8');
    $path = $_SERVER['DOCUMENT_ROOT'];

    if(!empty($_POST["cpf"]) && isset($_POST["cpf"])){
        $cpf = $_POST["cpf"];
    }else{
        $erro=401;
        include $path."/erro.php";
        exit;
    }
    if(!empty($_POST["email"]) && isset($_POST["email"])){
        $email = $_POST["email"];
    }else{
        $erro=401;
        include $path."/erro.php";
        exit;
    }
    if(!empty($_POST["senha"]) && isset($_POST["senha"])){
        $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
    }else{
        $erro=401;
        include $path."/erro.php";
        exit;
    }

    require_once($path."/scripts/php/banco/conexao.php");
    
    $cursos = $conexao->query("SELECT NOME FROM pes_curso");
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Formulário de Inscrição - Alunos</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="robots" content="none">
        <link rel="stylesheet" type="text/css" href="/scripts/css/no-scrollbar.css">
        <?php $path = $_SERVER['DOCUMENT_ROOT']; require_once($path."/scripts/php/componentes/links-head.php"); //Links padrões do head?>
    </head>

    <body>

        <main class="pt-0 w-100 h-100" id="FormularioInscricao"><!--Conteúdo da página-->
            <!-- Barra de navegação lateral -->
            <div class="coluna-barra-lateral d-none d-sm-block bg-inscricao">
                <div class="container-fluid" id="BotoesBarraLateral">
                    <img class="pt-3 pb-3" src="/img/logo-circular.png" width="100%">
                    <button class="btn btn-verde w-100 btn-ativo" id="BotaoInicio">Início</button>
                    <button class="btn btn-verde w-100 mt-2" id="BotaoDadosPessoais">Dados gerais</button>
                    <button class="btn btn-verde w-100 mt-2" id="BotaoDadosEscolares">Dados escolares</button>
                    <button class="btn btn-verde w-100 mt-2" id="BotaoDadosAdicionais">Dados adicionais</button>
                    <button class="btn btn-verde w-100 mt-2 mb-3" id="BotaoRevisarEnviar">Revisar e enviar</button>
                    <button class="btn btn-verde w-100 mb-3 btn-ativo ocultar" id="BotaoFinalizar">Finalizar</button>
                </div>
            </div><!-- /Barra de navegação lateral -->
            <!-- Coluna do formulário -->
            <div class="coluna-formulario container-fluid">
                <form action="/processo-seletivo/alunos/salvar-inscricao.php" method="POST" id="FormularioAlunos">
                    <div id="INICIO" class="corpo">
                        <div class="conteudo">
                            <div class="titulo">Ficha de Inscrição - Processo Seletivo de Alunos 2020</div>
                                <p class="text-justify">Olá candidato e, espero, futuro aluno do Cursinho PES. Estamos muito felizes por você querer fazer parte do projeto.</p>
                                <p class="text-justify">Antes de começar a preencher a ficha de inscrição, reiteramos a importância da leitura completa do <b>EDITAL Nº 03/PES/2020</b>, que está disponível <a href="/processo-seletivo/alunos/2020/Edital_N03PES2020.pdf" target="_blank">nesse link</a>. 
                                Nele estão contidas todas as regras, etapas e datas do Processo Seletivo. Caso ainda sim a qualquer momento você tenha alguma dúvida sobre o processo seletivo, você pode entrar em contato com a equipe do Cursinho  
                                através do e-mail: <b>processoseletivo@pes.ufsc.br</b> ou através das nossas redes sociais no <a href="https://www.facebook.com/PES.UFSC/" target="_blank">Facebook</a> ou <a href="https://www.instagram.com/cursinhopes/" target="_blank">Instagram</a>.</p>
                                <div class="subtitulo">Instruções para o preenchimento da ficha de inscrição</div>
                                    <p>Para começar a preencher a ficha de inscrição, confime abaixo a leitura completa do edital e em seguida clique no botão "Iniciar inscrição" no final dessa página. Todos os campos são obrigatórios, exceto os indicados com (opcional) ao lado da pergunta.</p>
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="ConfirmaLeituraEdital" name="ConfirmaLeituraEdital">
                                        <label class="custom-control-label" for="ConfirmaLeituraEdital">Eu declaro que realizei a leitura do <b>Edital Nº 03/PES/2020</b>, aceito seu termos e quero participar do Processo Seletivo de Alunos 2020.</label>
                                    </div>
                                    <div class="invalid-feedback font-100 ocultar" id="ErroConfirmaLeituraEdital"><b>ATENÇÃO!</b> Você precisa declarar ciência do Edital antes de prosseguir com a inscrição.</div>
                        </div>
                        <div class="rodape">
                            <button class="btn btn-verde" id="Anterior00">Cancelar</button>
                            <button class="btn btn-verde" id="Proximo00">Iniciar inscrição</button>
                        </div>
                    </div>
                    <div id="DADOS_PESSOAIS" class="d-none corpo">
                        <div class="conteudo">
                            <div class="titulo">Dados gerais</div>
                            <div class="subtitulo">Informações Pessoais</div>
                            <div class="form-row">
                                <div class="form-group col-sm">
                                    <label for="nome"><b>Nome:</b></label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" maxlength="30">
                                </div>
                                <div class="form-group col-sm">
                                    <label for="sobrenome"><b>Sobrenome:</b></label>
                                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome" maxlength="45">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="sexo"><b>Sexo:</b></label>
                                    <select class="form-control" name="sexo" id="sexo">
                                        <option value="null" selected>Selecione...</option>
                                        <option value="F">Feminino</option>
                                        <option value="M">Masculino</option>
                                        <option value="O">Outro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="rg"><b>Nº RG:</b></label>
                                    <input type="text" class="form-control" id="rg" name="rg" maxlength="30">
                                </div>
                                <div class="form-row col-md-9">
                                    <div class="form-group col-8">
                                        <label for="emissor"><b>Órgão Emissor:</b></label>
                                        <select class="form-control" id="orgao_emissor" name="orgao_emissor">
                                            <option value="null" selected>Selecione...</option>
                                            <option value="SSP">SSP - Secretaria de Segurança Pública</option>
                                            <option value="CGPI">CGPI – Coordenação-Geral de Privilégios e Imunidades</option>
                                            <option value="CNIG">CNIG – Conselho Nacional de Imigração</option>
                                            <option value="CNT">CNT – Carteira Nacional de Habilitação</option>
                                            <option value="DIC">DIC - Diretoria de Identificação Civil</option>
                                            <option value="IFP">IFP - Instituto Félix Pacheco</option>
                                            <option value="IPF">IPF - Instituto Pereira Faustino</option>
                                            <option value="MAE">MAE - Ministério da Aeronáutica</option>
                                            <option value="MEX">MEX - Ministério do Exército</option>
                                            <option value="MMA">MMA - Ministério da Marinha</option>
                                            <option value="MTE">MTE - Ministério do Trabalho e Emprego</option>
                                            <option value="PC">PC - Policia Civil</option>
                                            <option value="POF/DPF">POF/DPF – Polícia Federal</option>
                                            <option value="POM">POM – Polícia Militar</option>
                                            <option value="SDS">SDS – Secretaria de Defesa Social</option>
                                            <option value="SNJ">SNJ – Secretaria Nacional de Justiça / Departamento de Estrangeiros</option>
                                            <option value="SECC">SECC – Secretaria de Estado da Casa Civil</option>
                                            <option value="SEJUSP">SEJUSP – Secretaria de Estado de Justiça e Segurança Pública</option>
                                            <option value="SES/EST">SES/EST – Carteira de Estrangeiro</option>
                                            <option value="SESP">SESP – Secretaria de Estado da Segurança Pública do Paraná</option>
                                            <option value="SJS">SJS – Secretaria da Justiça e Segurança</option>
                                            <option value="SJTC">SJTC – Secretaria da Justiça do Trabalho e Cidadania</option>
                                            <option value="SJTS">SJTS – Secretaria da Justiça do Trabalho e Segurança</option>
                                            <option value="SPTC">SPTC – Secretaria de Polícia Técnico-Científica</option>
                                            <option value="-">Outro/não sei</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="uf_emissao"><b>UF emissor:</b></label>
                                        <select class="form-control" id="uf_emissor" name="uf_emissor">
                                            <option value="null" selected>Selecione...</option>
                                            <option value="AC">AC</option>
                                            <option value="AL">AL</option>
                                            <option value="AP">AP</option>
                                            <option value="AM">AM</option>
                                            <option value="BA">BA</option>
                                            <option value="CE">CE</option>
                                            <option value="DF">DF</option>
                                            <option value="ES">ES</option>
                                            <option value="GO">GO</option>
                                            <option value="MA">MA</option>
                                            <option value="MS">MS</option>
                                            <option value="MT">MT</option>
                                            <option value="MG">MG</option>
                                            <option value="PA">PA</option>
                                            <option value="PB">PB</option>
                                            <option value="PR">PR</option>
                                            <option value="PE">PE</option>
                                            <option value="PI">PI</option>
                                            <option value="RJ">RJ</option>
                                            <option value="RN">RN</option>
                                            <option value="RS">RS</option>
                                            <option value="RO">RO</option>
                                            <option value="RR">RR</option>
                                            <option value="SC">SC</option>
                                            <option value="SP">SP</option>
                                            <option value="SE">SE</option>
                                            <option value="TO">TO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="cpf"><b>CPF:</b></label>
                                    <input type="text" class="form-control cpf" id="cpf" name="cpf" value="<?php echo $cpf?>" readonly>
                                    <input type="text" id="senha" name="senha" value="<?php echo $senha?>" hidden>
                                </div>
                                <div class="form-row col-md-5">
                                    <div class="form-group col-6">
                                        <label for="data_nasc"><b>Data de Nascimento:</b></label>
                                        <input type="text" class="form-control" id="data_nasc" name="data_nasc" placeholder="dd/mm/aaaa">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="linha_idade"><b>Idade:</b></label>
                                        <div class="form-group row" id="linha_idade">
                                            <div class="col-6">
                                                <input type="text" class="form-control" id="idade" name="idade" readonly>
                                            </div>
                                            <label for="idade" class="col-form-label">Anos</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="DADOS_RESPONSAVEL_MENOR" class="ocultar">
                                <div class="subtitulo">Dados do responsável legal (obrigatório para menores de 18 anos)</div>
                                <div class="form-row">
                                    <div class="form-group col-md-9">
                                        <label for="nome_resp"><b>Nome completo:</b></label>
                                        <input type="text" class="form-control" id="nome_resp" name="nome_resp" maxlength="60">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="parentesco"><b>Grau de parentesco:</b></label>
                                        <select name="parentesco" id="parentesco" class="form-control">
                                            <option value="null" selected>Selecione...</option>
                                            <option value="Pai ou mãe">Pai ou mãe</option>
                                            <option value="Avô ou avó">Avô ou avó</option>
                                            <option value="Tio ou tia">Tio ou tia</option>
                                            <option value="Irmão ou irmã">Irmão ou irmã</option>
                                            <option value="Outro">Outro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="cpf_resp"><b>CPF:</b></label>
                                        <input type="text" class="form-control cpf" name="cpf_resp" id="cpf_resp" placeholder="___.___.___-__">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="telefone_aluno"><b>Telefone:</b></label>
                                        <input type="text" class="form-control telefone" name="telefone_resp" id="telefone_resp" placeholder="(__) ____-____">
                                    </div>
                                </div>
                            </div>
                            <div class="subtitulo">Informações de contato</div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="email"><b>E-mail:</b></label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="telefone_cand"><b>Telefone (WhatsApp):</b></label>
                                    <input type="text" class="form-control telefone" id="telefone_cand" name="telefone_cand" placeholder="(__) ____-____">
                                </div>
                            </div>
                            <div class="subtitulo">Informações de endereço</div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="cep"><b>CEP:</b></label>
                                    <input type="text" class="form-control" id="cep" name="cep">
                                </div>
                                <input type="text" id="tipo_endereco" name="tipo_endereco" hidden>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="endereco"><b>Endereço (rua):</b></label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" readonly maxlength="60">
                                </div>
                                <div class="form-row col-md-7">
                                    <div class="form-group col-3">
                                        <label for="numero"><b>Número:</b></label>
                                        <input type="text" class="form-control" id="numero" name="numero">
                                    </div>
                                    <div class="form-group col-9">
                                        <label for="complemento"><b>Complemento:</b></label><small> (Opcional)</small>
                                        <input type="text" class="form-control" id="complemento" name="complemento" maxlength="150">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="bairro"><b>Bairro:</b></label>
                                    <input type="text" class="form-control" id="bairro" name="bairro" readonly maxlength="60">
                                </div>
                                <div class="form-row col-md-7">
                                    <div class="form-group col-9">
                                        <label for="cidade"><b>Cidade:</b></label>
                                        <input type="text" class="form-control" id="cidade" name="cidade" readonly maxlength="60">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="uf"><b>Estado:</b></label>
                                        <input type="text" class="form-control" id="uf" name="uf" readonly maxlength="2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rodape">
                            <button class="btn btn-verde" id="Anterior01">Anterior</button>
                            <button class="btn btn-verde" id="Proximo01">Próximo</button>
                        </div>
                    </div>
                    <div id="DADOS_ESCOLARES" class="d-none corpo">
                        <div class="conteudo">
                            <div class="titulo">Dados escolares</div>
                            <p>Selecione abaixo se você já concluiu ou ainda está cursando o ensino médio:</p>
                            <div class="form-row">
                                <div class="form-group col-md-4 ml-4">
                                    <input class="form-check-input" type="radio" name="candidato_estudante" id="candidato_estudante" checked>
                                    <label class="form-check-label" for="tipo_aluno1">Estou cursando o ensino médio.</label>
                                </div>
                                <div class="form-group col-md-4 ml-4">
                                    <input class="form-check-input" type="radio" name="candidato_formado" id="candidato_formado">
                                    <label class="form-check-label" for="tipo_aluno2">Já conclui o ensino médio.</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="nome_escola" id="LabelNomeEscolaEstudante"><b>Nome da escola:</b></label>
                                    <label for="nome_escola" class="ocultar" id="LabelNomeEscolaFormado"><b>Escola em que concluiu o ensino médio:</b></label>
                                    <select class="form-control" id="nome_escola" name="nome_escola">
                                        <option value="null" selected>Selecione...</option>
                                        <option value="E.E.B. Araranguá">E.E.B. Araranguá</option>
                                        <option value="E.E.B. Bernardino Sena Campos">E.E.B. Bernardino Sena Campos</option>
                                        <option value="E.E.B. Prof.ª Dolvina Leite de Medeiros">E.E.B. Prof.ª Dolvina Leite de Medeiros</option>
                                        <option value="E.E.B. Prof.ª Maria Garcia Pessi">E.E.B. Prof.ª Maria Garcia Pessi</option>
                                        <option value="E.E.B. Prof.ª Maria Garcia Pessi">E.E.B. Prof.ª Maria Garcia Pessi</option>
                                        <option value="outra">Outra (informe qual)</option>
                                    </select>
                                </div>
                                <div class="form-row col-md-7">
                                    <div class="form-group col-9">
                                        <label for="cidade"><b>Cidade:</b></label>
                                        <input type="text" class="form-control" id="cidade_escola" name="cidade_escola" readonly>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="uf_endereco"><b>Estado:</b></label>
                                        <input type="text" class="form-control" id="uf_escola" name="uf_escola" readonly>
                                    </div>
                                </div>
                            </div>
                            <div id="NOVA_ESCOLA" class="ocultar mb-4">
                                <div class="subtitulo">Dados da escola</div>
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <input type="text" class="form-control teste" id="nome_nova_escola" name="nome_nova_escola" placeholder="Digite o nome da Escola" maxlength="60">
                                    </div>
                                    <div class="form-row col-md-7">
                                        <div class="form-group col">
                                            <input type="text" class="form-control" id="cidade_nova_escola" name="cidade_nova_escola" placeholder="Digite a cidade da Escola" maxlength="55">
                                        </div>
                                        <div class="form-group col-3" id="UF_NOVA_ESCOLA">
                                            <select class="form-control" id="uf_nova_escola" name="uf_nova_escola">
                                                <option value="null" selected>Estado...</option>
                                                <option value="AC">AC</option>
                                                <option value="AL">AL</option>
                                                <option value="AP">AP</option>
                                                <option value="AM">AM</option>
                                                <option value="BA">BA</option>
                                                <option value="CE">CE</option>
                                                <option value="DF">DF</option>
                                                <option value="ES">ES</option>
                                                <option value="GO">GO</option>
                                                <option value="MA">MA</option>
                                                <option value="MS">MS</option>
                                                <option value="MT">MT</option>
                                                <option value="MG">MG</option>
                                                <option value="PA">PA</option>
                                                <option value="PB">PB</option>
                                                <option value="PR">PR</option>
                                                <option value="PE">PE</option>
                                                <option value="PI">PI</option>
                                                <option value="RJ">RJ</option>
                                                <option value="RN">RN</option>
                                                <option value="RS">RS</option>
                                                <option value="RO">RO</option>
                                                <option value="RR">RR</option>
                                                <option value="SC">SC</option>
                                                <option value="SP">SP</option>
                                                <option value="SE">SE</option>
                                                <option value="TO">TO</option>
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <div class="btn btn-verde" id="adicionar_escola">Adicionar</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="DADOS_ESTUDANTE">
                                <div class="form-row">
                                    <div class="form-row col-md-6">
                                        <div class="form-group col-6">
                                            <label for="matricula"><b>Nº Matrícula:</b></label>
                                            <input type="text" class="form-control" id="matricula" name="matricula">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="serie"><b>Série:</b></label>
                                            <select class="form-control" id="serie" name="serie">
                                                <option value="null" selected>Selecione...</option>
                                                <option value="1ª">1º ano do Ensino Médio</option>
                                                <option value="2ª">2º ano do Ensino Médio</option>
                                                <option value="3ª">3º ano do Ensino Médio</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row col-md-6">
                                        <div class="form-group col-6">
                                            <label for="turma"><b>Turma:</b></label>
                                            <input type="text" class="form-control" id="turma" name="turma" maxlength="15">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="turno"><b>Turno:</b></label>
                                            <select class="form-control" id="turno" name="turno">
                                                <option value="null" selected>Selecione...</option>
                                                <option value="Matutino">Matutino</option>
                                                <option value="Vespertino">Vespertino</option>
                                                <option value="Noturno">Norturno</option>
                                                <option value="Integral">Integral (Manhã e Tarde)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="DADOS_FORMADO" class="ocultar">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="ano_conclusao"><b>Ano de conclusão:</b></label>
                                        <input type="text" class="form-control" id="ano_conclusao" name="ano_conclusao">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rodape">
                            <button class="btn btn-verde" id="Anterior02">Anterior</button>
                            <button class="btn btn-verde" id="Proximo02">Próximo</button>
                        </div>
                    </div>
                    <div id="DADOS_ADICIONAIS" class="d-none corpo">
                        <div class="conteudo">
                            <div class="titulo">Informações Adicionais</div>
                            <div class="subtitulo">Ocupação</div>
                            <div class="form-row">
                                <div class="form-group col-auto pt-1-5 mr-3">
                                    Você trabalha?
                                </div>
                                <div class="form-group col-md-5">
                                    <select class="form-control" name="trabalho" id="trabalho">
                                        <option value="null" selected>Selecione...</option>
                                        <option value="Não trabalho">Não trabalho</option>
                                        <option value="Trabalho alguns dias por semana">Trabalho alguns dias por semana</option>
                                        <option value="Trabalho de segunda a sexta">Trabalho de segunda a sexta</option>
                                        <option value="Trabalho apenas nos fins de semana">Trabalho apenas nos fins de semana</option>
                                        <option value="Trabalho de segunda a sexta e nos fins de semana">Trabalho de segunda a sexta e nos fins de semana</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-auto pt-1-5">
                                    Em qual período você trabalha?
                                </div>
                                <div class="form-group col-md-4">
                                    <select class="form-control" name="periodo_trabalho" id="periodo_trabalho">
                                        <option value="null" selected>Selecione...</option>
                                        <option value="Matutino">Matutino</option>
                                        <option value="Vespertino">Vespertino</option>
                                        <option value="Noturno">Noturno</option>
                                        <option value="Matutino e Vespertino">Matutino e Vespertino</option>
                                        <option value="Matutino e Noturno">Matutino e Noturno</option>
                                        <option value="Vespertino e Noturno">Vespertino e Noturno</option>
                                        <option value="Integral">Integral</option>
                                        <option value="Não trabalha" class="ocultar">Não trabalha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-auto pt-1-5 mr-3">
                                    Qual a sua carga horária diária de trabalho?
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control" name="carga_horaria_trabalho" id="carga_horaria_trabalho">
                                        <option value="null" selected>Selecione...</option>
                                        <option value="Menos de 4 horas">Menos de 4 horas</option>
                                        <option value="4 horas">4 horas</option>
                                        <option value="6 horas">6 horas</option>
                                        <option value="8 horas">8 horas</option>
                                        <option value="Mais de 8 horas">Mais de 8 horas</option>
                                        <option value="Não trabalha" class="ocultar">Não trabalha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="subtitulo">Rotina de estudos</div>
                            <div class="form-row">
                                <div class="form-group col-auto pt-1-5">
                                    Você possui uma rotina de estudos?
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control" name="rotina_estudo">
                                        <option value="null" selected>Selecione...</option>
                                        <option value="Não, não estudo em casa">Não, não estudo em casa</option>
                                        <option value="Não, só estudo quando tem prova ou trabalho">Não, só estudo quando tem prova ou trabalho</option>
                                        <option value="Sim, sempre separo um tempo do meu dia/semana para isso">Sim, sempre separo um tempo do meu dia/semana para isso</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-auto pt-1-5 mr-3">
                                    Quantos dias por semana você reserva para estudar em casa?
                                </div>
                                <div class="form-group col-md-4">
                                    <select class="form-control" name="dias_estudo">
                                        <option value="null" selected>Selecione...</option>
                                        <option value="Não estudo em casa">Não estudo em casa</option>
                                        <option value="De 1 a 2 dias por semana">De 1 a 2 dias por semana</option>
                                        <option value="De 3 a 4 dias por semana">De 3 a 4 dias por semana</option>
                                        <option value="De 5 a 6 dias por semana">De 5 a 6 dias por semana</option>
                                        <option value="Estudo todos os dias">Estudo todos os dias</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-auto pt-1-5">
                                    Nesses dias, em média quanto tempo você reserva para estudo?
                                </div>
                                <div class="form-group col-md-4">
                                    <select class="form-control" name="tempo_estudo">
                                        <option value="null" selected>Selecione...</option>
                                        <option value="Não reservo tempo para estudar">Não reservo tempo para estudar</option>
                                        <option value="Até 30 minutos">Até 30 minutos</option>
                                        <option value="De 30 minutos a 1 hora">De 30 minutos a 1 hora</option>
                                        <option value="De 1 a 2 horas">De 1 a 2 horas</option>
                                        <option value="De 2 a 3 horas">De 2 a 3 horas</option>
                                        <option value="De 3 a 4 horas">De 3 a 4 horas</option>
                                        <option value="Mais de 4 horas">Mais de 4 horas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="subtitulo">Mobilidade</div>
                            <div class="form-row">
                                <div class="form-group col-auto pt-1-5">
                                    De onde você virá para as aulas do cursinho?
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control" name="origem_trajeto">
                                        <option value="null" selected>Selecione...</option>
                                        <option value="De casa">De casa</option>
                                        <option value="Da escola">Da escola</option>
                                        <option value="Do trabalho">Do trabalho</option>
                                        <option value="De outro lugar">De outro lugar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-auto pt-1-5 mr-5">
                                    Qual meio de transporte você utilizará?
                                </div>
                                <div class="form-group col-3">
                                    <select class="form-control" name="transporte">
                                        <option value="null" selected>Selecione...</option>
                                        <option value="A pé">A pé</option>
                                        <option value="Bicicleta">Bicicleta</option>
                                        <option value="Carro">Carro</option>
                                        <option value="Moto">Moto</option>
                                        <option value="Carona com colega">Carona com colega</option>
                                        <option value="Ônibus">Ônibus</option>
                                        <option value="Van alugada">Van alugada</option>
                                        <option value="Outro">Outro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-auto pt-1-5">
                                    Em média, quanto tempo levará o trajeto considerando as informações acima?
                                </div>
                                <div class="form-group col-3">
                                    <select class="form-control" name="tempo_trajeto">
                                        <option value="null" selected>Selecione...</option>
                                        <option value="Menos de 15 minutos">Menos de 15 minutos</option>
                                        <option value="Entre 15 a 30 minutos">Entre 15 a 30 minutos</option>
                                        <option value="Entre 30 a 45 minutos">Entre 30 a 45 minutos</option>
                                        <option value="Entre 45 minutos a 1 hora">Entre 45 minutos a 1 hora</option>
                                        <option value="De 1 a 2 horas">De 1 a 2 horas</option>
                                        <option value="Mais de 2 horas">Mais de 2 horas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="subtitulo">Universidade</div>
                            <div class="form-row">
                                <div class="form-group col-auto pt-1-5 mr-5 pl-2">
                                    Você já prestou vestibular ou ENEM alguma vez?
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control" name="fez_vestibular">
                                        <option value="null" selected>Selecione...</option>
                                        <option value="Não">Não</option>
                                        <option value="Já prestei o ENEM">Já prestei o ENEM</option>
                                        <option value="Já pestei o vestibular da UFSC">Já pestei o vestibular da UFSC</option>
                                        <option value="Já prestei o vestibular da UFSC e o ENEM">Já prestei o vestibular da UFSC e o ENEM</option>
                                        <option value="á prestei o vestibular de outra(s) universidade(s)">Já prestei o vestibular de outra(s) universidade(s)</option>
                                        <option value="Já prestei o vestibular de outra(s) universidade(s) e o ENEM">Já prestei o vestibular de outra(s) universidade(s) e o ENEM</option>
                                        <option value="Já prestei o vestibular da UFSC e de outra(s) universidade(s)">Já prestei o vestibular da UFSC e de outra(s) universidade(s)</option>
                                        <option value="Já prestei o vestibular da UFSC, de outra(s) universidade(s) e o ENEM">Já prestei o vestibular da UFSC, de outra(s) universidade(s) e o ENEM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-auto pt-1-5">
                                    Em qual curso você pretende ingressar na Universidade?
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control" name="curso">
                                        <option value="null" selected>Selecione...</option>
                                        <option value="Ainda não decidiu">Ainda não decidi</option>
                                    <?php
                                        if(!empty($cursos)){
                                            foreach($cursos as $valor){?>
                                        <option value="<?php echo $valor['NOME']?>"><?php echo $valor['NOME']?></option>
                                    <?php   }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-auto pt-1-5 mr-4 pl-3">
                                    Em qual tipo de universidade você pretende entrar?
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control" name="tipo_universidade">
                                        <option value="null" selected>Selecione...</option>
                                        <option value="Universidade Pública">Universidade Pública</option>
                                        <option value="Universidade Privada">Universidade Privada</option>
                                        <option value="Universidade Privada, com bolsa">Universidade Privada, com bolsa</option>
                                        <option value="Universidade Privada, com financiamento">Universidade Privada, com financiamento</option>
                                        <option value="Universidade Pública ou privada com bolsa/financiamento">Universidade Pública ou privada com bolsa/financiamento</option>
                                    </select>
                                </div>
                            </div>
                            <div class="subtitulo">Como você ficou sabendo do processo seletivo?</div>
                                    <p>Selecione na lista a seguir atravès de quais meios de comunicação você tomou conhecimento do processo seletivo. Selecione todas as respostas aplicáveis.</p>
                                    <div id="PESQUISA_DIVULGACAO">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="divulgacao_instagram" name="divulgacao_instagram">
                                                    <label class="custom-control-label" for="divulgacao_instagram">Instagram</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="divulgacao_facebook" name="divulgacao_facebook">
                                                    <label class="custom-control-label" for="divulgacao_facebook">Facebook</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="divulgacao_cartaz" name="divulgacao_cartaz">
                                                    <label class="custom-control-label" for="divulgacao_cartaz">Cartaz nos murais da escola</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="divulgacao_escola" name="divulgacao_escola">
                                                    <label class="custom-control-label" for="divulgacao_escola">O Cursinho PES passou na minha escola</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="divulgacao_amigo_familiar" name="divulgacao_amigo_familiar">
                                                    <label class="custom-control-label" for="divulgacao_amigo_familiar">Indicação de amigo/familiar</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="divulgacao_revista" name="divulgacao_revista">
                                                    <label class="custom-control-label" for="divulgacao_revista">Revista</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="divulgacao_tv" name="divulgacao_tv">
                                                    <label class="custom-control-label" for="divulgacao_tv">Televisão</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="divulgacao_radio" name="divulgacao_radio">
                                                    <label class="custom-control-label" for="divulgacao_radio">Rádio</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="divulgacao_jornal" name="divulgacao_jornal">
                                                    <label class="custom-control-label" for="divulgacao_jornal">Jornal</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="divulgacao_outro" name="divulgacao_outro">
                                                    <label class="custom-control-label" for="divulgacao_outro">Outro</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback font-100 ocultar" id="ErroPesquisaDivulgacao"><b>ATENÇÃO!</b> Você precisa selecionar pelo menos uma das opções acima.</div>
                                    </div>
                        </div>
                        <div class="rodape">
                            <button class="btn btn-verde" id="Anterior03">Anterior</button>
                            <button class="btn btn-verde" id="Proximo03">Próximo</button>
                        </div>
                    </div>
                    <div id="REVISAR_ENVIAR" class="d-none corpo">
                        <div class="conteudo">
                            <div class="titulo">Revisar e Enviar</div>
                                <p class="text-justify">Verifique se as principais informações apresentadas a seguir estão corretas. Em caso de divergências, volte até o campo em questão e corrija as informações antes de enviar.
                                    Caso esteja tudo certo, confirme marcando a caixa de seleção abaixo e clique no botão "Enviar inscrição" para concluir.</p>
                                <div class="subtitulo">Informações pessoais</div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nomeREV"><b>Nome Completo:</b></label>
                                            <input type="text" class="form-control" id="nomeREV" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="cpfREV"><b>Nº CPF:</b></label>
                                            <input type="text" class="form-control" id="cpfREV" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="dataREV"><b>Data de Nasc.:</b></label>
                                            <input type="text" class="form-control" id="dataREV" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="rgREV"><b>Nº RG:</b></label>
                                            <input type="text" class="form-control" id="rgREV" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="orgaoREV"><b>Orgão emissor:</b></label>
                                            <input type="text" class="form-control" id="orgaoREV" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="ufREV"><b>UF emissor:</b></label>
                                            <input type="text" class="form-control" id="ufREV" readonly>
                                        </div>
                                    </div>
                                <div id="INFO_RESPONSAVEL" class="ocultar">
                                    <div class="subtitulo">Informações do responsável:</div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nome_respREV"><b>Nome completo:</b></label>
                                                <input type="text" class="form-control" id="nome_respREV" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="cpf_respREV"><b>Nº CPF:</b></label>
                                                <input type="text" class="form-control" id="cpf_respREV" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="parentescoREV"><b>Parentesco:</b></label>
                                                <input type="text" class="form-control" id="parentescoREV" readonly>
                                            </div>
                                        </div>
                                </div>
                                <div class="subtitulo">Informações de contato</div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="emailREV"><b>E-mail:</b></label>
                                            <input type="text" class="form-control" id="emailREV" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="telefoneREV"><b>Telefone:</b></label>
                                            <input type="text" class="form-control" id="telefoneREV" readonly>
                                        </div>
                                        <div class="form-group col-md-3 ocultar" id="TELEFONE_RESP_REV">
                                            <label for="telefone_respREV"><b>Telefone (responsável):</b></label>
                                            <input type="text" class="form-control" id="telefone_respREV" readonly>
                                        </div>
                                    </div>
                                <div id="INFO_ACADEMICAS">
                                    <div class="subtitulo">Informações escolares</div>
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="nome_esc_REV"><b>Nome da escola:</b></label>
                                                <input type="text" class="form-control" id="nome_esc_REV" readonly>
                                            </div>
                                            <div class="form-group col-md-3 ocultar" id="MAT_REV">
                                                <label for="matREV"><b>Matrícula:</b></label>
                                                <input type="text" class="form-control" id="matREV" readonly>
                                            </div>
                                            <div class="form-group col-md-4 ocultar" id="SERIE_REV">
                                                <label for="sobrenome"><b>Série/Turma - Turmo:</b></label>
                                                <input type="serieREV" class="form-control" id="serieREV" readonly>
                                            </div>
                                            <div class="form-group col-md-3 ocultar" id="REV_FORMADO">
                                                <label for="conclusaoREV"><b>Ano de conclusão:</b></label>
                                                <input type="text" class="form-control" id="conclusaoREV" readonly>
                                            </div>
                                        </div>
                                </div> 
                                <div class="subtitulo">Confirmação</div>
                                    <p>Se as informações acima estiverem corretas, selecione a caixa abaixo para confirmar.</p>
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="ConfirmacaoRevisao" name="ConfirmacaoRevisao">
                                        <label class="custom-control-label" for="ConfirmacaoRevisao">Confirmo que as informações apresentadas acima estão corretas.</label>
                                    </div>
                                    <div class="invalid-feedback font-100 ocultar" id="ErroConfirmacaoRevisao"><b>ATENÇÃO!</b> Você precisa confirmar que as informações apresentadas acima estão corretas.</div>
                        </div>
                        <div class="rodape">
                            <button class="btn btn-verde" id="Anterior04">Anterior</button>
                            <button class="btn btn-verde" id="Proximo04">Enviar Inscrição</button>
                        </div>
                    </div>
                </form>
                <div id="FINALIZAR" class="d-none corpo">
                    <div class="conteudo">
                        <div class="titulo">Finalizar Inscrição</div>
                        <div id="SALVANDO_RESPOSTA">
                            <p>Estamos salvando suas respostas.</p>
                            <p>Aguarde...</p>
                        </div>
                        <div id="FINALIZAR_SUCESSO" class="ocultar">
                            <p>Sua inscrição foi salva com sucesso!</p>
                            <P>Enviamos a confirmação de inscrição para o seu e-mail.</P>
                        </div>
                        <div id="FINALIZAR_ERRO_EMAIL" class="ocultar">
                            <p>Sua inscrição foi salva com sucesso!</p>
                            <p>Mas ocorreu um erro ao tentar enviar a confirmação de inscrição para o endereço de e-mail fornecido.</p>
                        </div>
                        <div id="FINALIZAR_ERRO_GRAVE" class="ocultar">
                            <p>Não foi possível concluir sua inscrição.</p>
                            <p>Recomendamos tentar realizar a inscrição novamente mais tarde.</p>
                            <p>Se o erro persistir entre em contato com a equipe do cursinho pelo e-mail <b>contato@pes.ufsc.br.</b></p>
                        </div>
                        <div id="FINALIZAR_ERRO_SERVIDOR" class="ocultar">
                            <p>Não foi possível concluir sua inscrição.</p>
                            <p>Houve erro na comunicação com o nosso servidor.</p>
                            <p>Recomendamos tentar realizar a inscrição novamente mais tarde.</p>
                            <p>Se o erro persistir entre em contato com a equipe do cursinho pelo e-mail <b>contato@pes.ufsc.br.</b></p>
                        </div>
                    </div>
                    <div class="rodape">
                        <button class="btn btn-verde" id="EncerrarInscricao" disabled>Encerrar Inscrição</button>
                    </div>
                </div>
            </div><!-- /Coluna do formulário -->
            <!-- Modal Recuperar Senha -->
            <button type="button" class="btn btn-verde" data-toggle="modal" data-target="#MensagemErro" id="BotaoMensagemErro" hidden></button>
            <div class="modal fade" id="MensagemErro" tabindex="-1" role="dialog" aria-labelledby="TituloMensagemErro" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-bordo-pes">
                            <h5 class="modal-title" id="TituloMensagemErro">ATENÇÃO!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <p>Existem campos preenchidos incorretamente nessa página.</p>
                                <p>Preencha corretamente todos os campos antes de prosseguir.</p>
                            </div>
                        </div>
                        <div class="modal-footer bg-bordo-pes">
                            <button type="button" class="btn btn-verde" data-dismiss="modal">Entendi</button>
                        </div>
                    </div>
                </div>
            </div><!--/Modal Recuperar Senha -->
        </main><!--/Conteúdo da página-->
        
        <!--Javascript-->
        <script src="/scripts/js/libs/jquery.min.js"></script>
        <script src="/scripts/js/libs/bootstrap.min.js"></script>
        <script src="/scripts/js/libs/api_viacep.js"></script>
        <script src="/scripts/js/libs/jquery.maskedinput.min.js"></script>
        <script src="/scripts/js/definicoes-maskedinput.js"></script>
        <script src="/scripts/js/libs/jquery.validate.min.js"></script>
        <script src="/scripts/js/validacao/inscricao-PSAlunos.js"></script>
        <script src="/scripts/js/pagina/inscricao-PSAlunos.js"></script>
        <script>
            
        </script>
    </body>
</html>