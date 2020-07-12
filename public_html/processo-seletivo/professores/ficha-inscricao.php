<?php
    // Definição de datas
    $inicio_inscricoes = '13/07/2020 00:00:00';
    $final_inscricoes = '25/07/2020 23:59:59';
    $timezone = new DateTimeZone('America/Sao_Paulo');
    $agora = new DateTime('now', $timezone);
    $inicio = DateTime::createFromFormat('d/m/Y H:i:s', $inicio_inscricoes, $timezone);
    $final = DateTime::createFromFormat('d/m/Y H:i:s', $final_inscricoes, $timezone);

    ini_set('default_charset','utf-8');
    $path = $_SERVER['DOCUMENT_ROOT'];

    if(!empty($_POST["cpf"]) && isset($_POST["cpf"])){
        
        $cpf = $_POST["cpf"];

        require_once($path."/scripts/php/banco/conexao.php");

        $cpf2 = preg_replace('/[^0-9]/', '', $_POST["cpf"]);

        $resultado = $conexao->query("SELECT ID_USUARIO FROM pes_usuario WHERE USUARIO = '{$cpf2}' LIMIT 1");

        $inscrito = ($resultado->num_rows == 1)? true:false;
        $obj = $resultado->fetch_object();
        $id_usuario = $obj->ID_USUARIO;
        $resultado->close();
        $resultado = $conexao->query("SELECT ID_VOLUNT, DATA_REGISTRO FROM pes_volunt WHERE ID_USUARIO = $id_usuario AND VERSAO_PS = '2020-2'");
        $cadastro_existente = ($resultado->num_rows == 1)? true:false;
        if($cadastro_existente){
            $obj = $resultado->fetch_object();
            $data_registro_str = $obj->DATA_REGISTRO;
            $resultado->close();
            $resultado = $conexao->query("SELECT NOME, SOBRENOME, NUM_WPP, EMAIL, DATA_NASC FROM info_pessoal WHERE CPF = '{$cpf2}' LIMIT 1");
            $info_inscrito = $resultado->fetch_object();
            $resultado->close();
        }    
    }else{
        $erro=401;
        include $path."/erro.php";
        exit;
    }

    $cursos = $conexao->query("SELECT ID_CURSO, NOME FROM pes_curso");
    $disciplinas = $conexao->query("SELECT ID_DISCIPLINA, NOME FROM pes_disciplina WHERE DISPONIBILIDADE = 1");

    $conexao->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Formulário de Inscrição - Professores</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="robots" content="none">
        <link rel="stylesheet" type="text/css" href="/scripts/css/no-scrollbar.css">
        <?php $path = $_SERVER['DOCUMENT_ROOT']; require_once($path."/scripts/php/componentes/links-head.php"); //Links padrões do head?>
    </head>

    <body>
    <?php if($agora < $inicio){ ?>
        <!-- Mensagem de erro: prazo não iniciado -->
        <div class="container mt-5 mb-5 text-center">
            <h1>O Prazo de inscrição ainda não começou!</h1>
        </div>
        <div class="container text-center">
            <p>O prazo de inscrição para esse processo seletivo se <b>inicia no dia <?php echo $inicio->format('d/m/Y'); ?> às <?php echo $inicio->format('H:i:s'); ?></b>. Retorne ao site após essa data para realizar a sua inscrição.</p>
            <p>Apenas lembrando, o prazo de inscrição <b>encerra no dia <?php echo $final->format('d/m/Y'); ?> às <?php echo $final->format('H:i:s'); ?>,</b> sendo necessário enviar sua inscrição antes disso! ;)</p>
            <p><a href="/">Clique aqui</a> para voltar a página inicial do site.</p>
        </div>
        <!-- Scripts -->
        <script src="/scripts/js/libs/jquery-3.4.1.min.js"></script>
        <script src="/scripts/js/libs/bootstrap.min.js"></script>
<?php }else if($agora > $final){ ?>
        <!-- Mensagem de erro: prazo encerrado -->
        <div class="container mt-5 mb-5 text-center">
            <h1>Prazo de inscrição encerrado!</h1>
        </div>
        <div class="container text-center">
            <p>Você não pode mais se inscrever para esse processo seletivo, o prazo de inscrição <b>encerrou no dia <?php echo $final->format('d/m/Y'); ?> às <?php echo $final->format('H:i:s'); ?></b>.</p>
            <p><a href="/">Clique aqui</a> para voltar a página inicial do site.</p>
        </div>
        <!-- Scripts -->
        <script src="/scripts/js/libs/jquery-3.4.1.min.js"></script>
        <script src="/scripts/js/libs/bootstrap.min.js"></script>
<?php }else if($cadastro_existente){ 
        $data_nasc = DateTime::createFromFormat('Y-m-d', $info_inscrito->DATA_NASC, $timezone);
        $data_registro = DateTime::createFromFormat('Y-m-d H:i:s', $data_registro_str, $timezone);
        $email = explode('@', trim($info_inscrito->EMAIL));
?>
        <!-- Mensagem de erro: Aluno já inscrito -->
        <div class="container mt-5 mb-5 text-center">
            <h1>ATENÇÃO: Você já realizou a inscrição no Grupo de Estudos!</h1>
        </div>
        <div class="container text-center">
            <p class="text-justify">A inscrição para o número de CPF informado foi registrada com sucesso na nossa base de dados no dia <b><?php echo $data_registro->format('d/m/Y'); ?></b> às <b><?php echo $data_registro->format('H:i:s'); ?>.</b></p>
            <p class="text-justify mt-4"><b>RESUMO DOS DADOS DA INSCRIÇÃO:</b></p>
            <p class="text-justify mb-1"><b>Nome: </b><?php echo $info_inscrito->NOME." ".$info_inscrito->SOBRENOME; ?></p>
            <p class="text-justify mb-1"><b>CPF: </b><?php echo $cpf; ?> </p>
            <p class="text-justify mb-1"><b>Data de nascimento: </b><?php echo $data_nasc->format('d/m/Y'); ?></p>
            <p class="text-justify mb-1"><b>Endereço de e-mail: </b><?php echo substr($email[0], 0, -5).'*****@'.$email[1]; ?> </p>
            <p class="text-justify"><b>Número de telefone: </b><?php echo '('.substr(trim($info_inscrito->NUM_WPP), 0, 2).') 9 ****-'.substr(trim($info_inscrito->NUM_WPP), -4); ?></p>
            <p class="text-justify mb-4"><small>* Por questão de privacidade, foram omitidos alguns caracteres do e-mail e telefone de contato.</small> </p>
            <p class="text-justify mb-4">Caso alguma informação esteja incorreta, você pode entrar em contato pelo e-mail <b>processoseletivo@pes.ufsc.br</b> para que sejam feitas as respectivas correções.
             Entraremos em contato pelo e-mail fornecido na inscrição a partir do dia <b><?php $final->add(new DateInterval('P1D')); echo $final->format('d/m/Y'); ?></b> para informar as instruções das próximas etapas do processo seletivo.</p>
            <p><a href="/">Clique aqui</a> para voltar a página inicial do site.</p>
        </div>
        <!-- Scripts -->
        <script src="/scripts/js/libs/jquery-3.4.1.min.js"></script>
        <script src="/scripts/js/libs/bootstrap.min.js"></script>
<?php }else{ ?>
        <main class="pt-0 w-100 h-100" id="FormularioInscricao"><!--Conteúdo da página-->
            <!-- Barra de navegação lateral -->
            <div class="coluna-barra-lateral d-none d-sm-block bg-inscricao">
                <div class="container-fluid" id="BotoesBarraLateral">
                    <img class="pt-3 pb-3" src="/img/logo-circular.png" width="100%">
                    <button class=" btn btn-verde btn-ativo w-100" id="BotaoInicio">Início</button>
                    <button class="btn btn-verde w-100 mt-2" id="BotaoDadosPessoais">Dados Pessoais</button>
                    <button class="btn btn-verde w-100 mt-2" id="BotaoDisciplinaMotivacao">Matérias e Motivação</button>
                    <button class="btn btn-verde w-100 mt-2" id="BotaoDisponibilidade">Disponibilidade</button>
                    <button class="btn btn-verde w-100 mt-2" id="BotaoDadosAdicionais">Dados Adicionais</button>
                    <button class="btn btn-verde w-100 mt-2 mb-3" id="BotaoRevisarEnviar">Revisar e Enviar</button>
                    <button class="btn btn-verde w-100 mb-3 btn-ativo ocultar" id="BotaoFinalizar">Finalizar</button>
                </div>
            </div><!-- /Barra de navegação lateral -->
            <!-- Coluna do formulário -->
            <div class="coluna-formulario container-fluid">
                <form action="/processo-seletivo/gestao/salvar-inscricao.php" method="POST" id="FormularioProfessores">
                    <div id="INICIO" class="corpo">
                        <div class="conteudo">
                        <div class="titulo">Ficha de Inscrição - Processo Seletivo de Professores 2020</div>
                                <p class="text-justify">Olá candidato e, espero, futuro professor do Cursinho PES. Estamos muito felizes por você querer fazer parte do projeto.</p>
                                <p class="text-justify">Antes de começar a preencher a ficha de inscrição, reiteramos a importância da leitura completa do <b>EDITAL Nº 02/PES/2020</b>, que está disponível <a href="/processo-seletivo/professores/2020/Edital_N02PES2020.pdf" target="_blank">nesse link</a>. 
                                Nele estão contidas todas as regras, etapas e datas do Processo Seletivo. Caso ainda sim a qualquer momento você tenha alguma dúvida sobre o processo seletivo, você pode entrar em contato com a quipe do Cursinho  
                                através do e-mail: <b>processoseletivo@pes.ufsc.br</b> ou através das nossas redes sociais no <a href="https://www.facebook.com/PES.UFSC/" target="_blank">Facebook</a> ou <a href="https://www.instagram.com/cursinhopes/" target="_blank">Instagram</a>.</p>
                                <div class="subtitulo">Instruções para o preenchimento da ficha de inscrição</div>
                                    <p>Para começar a preencher a ficha de inscrição, confime abaixo a leitura completa do edital e em seguida clique no botão "Iniciar inscrição" no final dessa página. Todos os campos são obrigatórios, exceto os indicados com (opcional) ao lado da pergunta.</p>
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="ConfirmaLeituraEdital" name="ConfirmaLeituraEdital">
                                        <label class="custom-control-label" for="ConfirmaLeituraEdital">Eu declaro que realizei a leitura do <b>Edital Nº 02/PES/2020</b>, aceito seu termos e quero participar do Processo Seletivo de Professores 2020.</label>
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
                            <div class="titulo">Dados pessoais</div>
                            <div class="subtitulo">Informações gerais</div>
                            <div class="form-row">
                                <div class="form-group col-sm">
                                    <label for="nome"><b>Nome:</b></label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome">
                                </div>
                                <div class="form-group col-sm">
                                    <label for="sobrenome"><b>Sobrenome:</b></label>
                                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Digite seu sobrenome">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="sexo"><b>Sexo:</b></label>
                                    <select class="form-control" name="sexo" id="sexo">
                                        <option value="null" selected>Selecione...</option>
                                        <option value="F">Feminino</option>
                                        <option value="M">Masculino</option>
                                        <option value="0">Outro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="cpf"><b>CPF:</b></label>
                                    <input type="text" class="form-control cpf" id="cpf" name="cpf" value=<?php echo "\"$cpf\""; ?> readonly>
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
                                        <input type="text" class="form-control" id="nome_resp" name="nome_resp">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="parentesco"><b>Grau de parentesco:</b></label>
                                        <select name="parentesco" class="form-control" id="parentesco">
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
                                        <input type="text" class="form-control cpf" name="cpf_resp" id="cpf_resp"placeholder="___.___.___-__">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="telefone_resp"><b>Telefone:</b></label>
                                        <input type="text" class="form-control telefone" id="telefone_resp" name="telefone_resp">
                                    </div>
                                </div>
                            </div>
                            <div class="subtitulo">Informações de contato</div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="email"><b>E-mail:</b></label>
                                    <input type="email" class="form-control" id="email" name="email" value=<?php echo "\"$email\""; ?> readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="telefone_cand"><b>Telefone (WhatsApp):</b></label>
                                    <input type="text" class="form-control telefone" id="telefone_cand" name="telefone_cand">
                                </div>
                            </div>
                        </div>
                        <div class="rodape">
                            <button class="btn btn-verde" id="Anterior01">Anterior</button>
                            <button class="btn btn-verde" id="Proximo01">Próximo</button>
                        </div>
                    </div>
                    <div id="DISCIPLINA_MOTIVACAO" class="d-none corpo">
                        <div class="conteudo">
                            <div class="titulo">Matérias e Motivação</div>
                            <p class="mb-1 text-justify">Nessa seção você deve indicar a(s) matérias(s) que você pretende lecionar no Cursinho PES e porque você deseja fazer parte do projeto.</p>
                            <p>Abaixo, você pode indicar uma, duas ou até três matérias, por ordem de importância, nas quais você tem interesse em ser professor.</p>
                            <div class="subtitulo">Matérias</div>
                            <div class="form-row">
                                <div class="form-group col-auto pt-1-5">
                                    Qual matéria é a sua <b>PRIMEIRA OPÇÃO</b> para lecionar?
                                </div>
                                <div class="form-group col-md-4">
                                    <select class="form-control" id="materia01" name="materia01">
                                        <option value="null" selected>Selecione...</option>
                                    <?php
                                        if(!empty($disciplinas)){
                                            foreach($disciplinas as $valor){?>
                                        <option value="<?php echo $valor['ID_DISCIPLINA']?>"><?php echo $valor['NOME']?></option>
                                    <?php   }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-auto pt-1-5">
                                    Qual matéria é a sua <b>SEGUNDA OPÇÃO</b> para lecionar?
                                </div>
                                <div class="form-group col-md-4">
                                    <select class="form-control" id="materia02" name="materia02">
                                        <option value="null" selected>Selecione... (opcional)</option>
                                    <?php
                                        if(!empty($disciplinas)){
                                            foreach($disciplinas as $valor){?>
                                        <option value="<?php echo $valor['ID_DISCIPLINA']?>"><?php echo $valor['NOME']?></option>
                                    <?php   }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-auto pt-1-5">
                                    Qual matéria é a sua <b>TERCEIRA OPÇÃO</b> para lecionar?
                                </div>
                                <div class="form-group col-md-4 h-100 align-middle">
                                    <select class="form-control" id="materia03" name="materia03">
                                        <option value="null" selected>Selecione... (opcional)</option>
                                    <?php
                                        if(!empty($disciplinas)){
                                            foreach($disciplinas as $valor){?>
                                        <option value="<?php echo $valor['ID_DISCIPLINA']?>"><?php echo $valor['NOME']?></option>
                                    <?php   }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="materia_especifica">Dentro da(s) matéria(s) selecionada(s), quais áreas você tem maior afinidade/domínio?</label>
                                <textarea class="form-control" rows="3" id="materia_especifica" name="materia_especifica" maxlength="1024"></textarea>
                            </div>
                            <div class="subtitulo">Motivação</div>
                            <div class="form-group">
                                <label for="porque_entrar">Por que você gostaria de fazer parte do Cursinho PES?</label>
                                <textarea class="form-control" rows="3" id="porque_entrar" name="porque_entrar" maxlength="1024"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="como_ajudar">Como você acredita que pode ajudar fazendo parte do Cursinho PES?</label>
                                <textarea class="form-control" rows="3" id="como_ajudar" name="como_ajudar" maxlength="1024"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="porque_educacao">O que te motiva a trabalhar com educação?</label>
                                <textarea class="form-control" rows="3" id="porque_educacao" name="porque_educacao" maxlength="1024"></textarea>
                            </div>
                        </div>
                        <div class="rodape">
                            <button class="btn btn-verde" id="Anterior02">Anterior</button>
                            <button class="btn btn-verde" id="Proximo02">Próximo</button>
                        </div>
                    </div>
                    <div id="DISPONIBILIDADE" class="d-none corpo">
                        <div class="conteudo">
                            <div class="titulo mb-3">Disponibilidade</div>
                            <p class="mb-1 text-justify">As aulas do Cursinho PES ocorrem de segunda a sexta-feira no Campus da UFSC Jardim das Avenidas, no horário das 18h30min às 22h. </p>
                            <p class="mb-1 text-justify">Em 2020 as aulas irão seguir o calendário letivo disponível <a href="/processo-seletivo/professores/2020/Calendario2020-Professores.pdf" target="_blank">nesse link.</a></p>
                            <p class="mb-1 text-justify">Cada aula possuí duração de 50 minutos e cada professor leciona uma aula por semana, salvo o período de aula teste do processo seletivo de alunos. 
                                Neste período, que ocorre entre 6 a 29 de abril de 2020, cada professor irá lecionar duas aulas por semana de acordo com as específicações do Anexo I do Edital de inscrição disponível 
                                <a href="/processo-seletivo/professores/2020/Edital_N02PES2020-Anexo_I.pdf" target="_blank">nesse link.</a></p>
                            <p class="text-justify">Além da aula de 50min/semana, lembramos que cada professor é responsável por preparar a sua aula. Desta forma, é necessário separar um tempo a mais na semana
                                para isso. Também é dever do professor participar das reuniões com a gestão, cuja as datas já foram definidas e constam no calendário letivo disponível 
                                (<a href="/processo-seletivo/professores/2020/Calendario2020-Professores.pdf" target="_blank">nesse link.</a>)</p>
                            <div class="subtitulo">Disponibilidade semanal</div>
                            <div class="form-row">
                                <div class="form-group col-auto pt-1-5">
                                    Até quantas horas semanais você pode dedicar ao projeto?
                                </div>
                                <div class="form-group col-md-4">
                                    <select class="form-control" id="quantas_horas" name="quantas_horas">
                                        <option value="null" selected>Selecione...</option>
                                        <option value="Até 2 horas">Até 2 horas</option>
                                        <option value="Até 4 horas">Até 4 horas</option>
                                        <option value="Até 6 horas">Até 6 horas</option>
                                        <option value="Até 8 horas">Até 8 horas</option>
                                        <option value="Até 10 horas">Até 10 horas</option>
                                        <option value="Até 12 horas">Até 12 horas</option>
                                        <option value="Até 14 horas">Até 14 horas</option>
                                        <option value="Até 16 horas">Até 16 horas</option>
                                        <option value="Mais de 16 horas">Mais de 16 horas</option>
                                    </select>
                                </div>
                            </div>
                            <p class="text-justify">Na tabela abaixo, selecione os horários nos quais você tem disponibilidade para lecionar a sua aula. Selecione todas as
                                respostas aplicáveis, elas serão utilizadas pela diretoria Docente para montar a grade de horários semanal.</p>
                            <div class="subtitulo">Disponibilidade de horário</div>
                            <div id="disponibilidade">
                                <div class="form-row">
                                    <div class="form-group col-auto centralizar-horas">
                                        <b>Início<br>Final</b>
                                    </div>
                                    <div class="form-group col centralizar-dias">
                                        <b><spam class="desktop">Segunda</spam><spam class="mobile">Seg.</spam></b>
                                    </div>
                                    <div class="form-group col centralizar-dias">
                                        <b><spam class="desktop">Terça</spam><spam class="mobile">Ter.</spam></b>
                                    </div>
                                    <div class="form-group col centralizar-dias">
                                        <b><spam class="desktop">Quarta</spam><spam class="mobile">Qua.</spam></b>
                                    </div>
                                    <div class="form-group col centralizar-dias">
                                        <b><spam class="desktop">Quinta</spam><spam class="mobile">Qui.</spam></b>
                                    </div>
                                    <div class="form-group col centralizar-dias">
                                        <b><spam class="desktop">Sexta</spam><spam class="mobile">Sex.</spam></b>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-auto centralizar-horas">
                                        <b>18h30<br>19h20</b>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="SEG1" value="Indisponível" readonly>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="TER1" value="Indisponível" readonly>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="QUA1" value="Indisponível" readonly>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="QUI1" value="Indisponível" readonly>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="SEX1" value="Indisponível" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-auto centralizar-horas">
                                        <b>19h20<br>20h10</b>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="SEG2" value="Indisponível" readonly>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="TER2" value="Indisponível" readonly>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="QUA2" value="Indisponível" readonly>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="QUI2" value="Indisponível" readonly>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="SEX2" value="Indisponível" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-auto centralizar-horas">
                                        <b>20h20<br>21h10</b>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="SEG3" value="Indisponível" readonly>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="TER3" value="Indisponível" readonly>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="QUA3" value="Indisponível" readonly>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="QUI3" value="Indisponível" readonly>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="SEX3" value="Indisponível" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-auto centralizar-horas">
                                        <b>21h10<br>22h</b>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="SEG4" value="Indisponível" readonly>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="TER4" value="Indisponível" readonly>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="QUA4" value="Indisponível" readonly>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="QUI4" value="Indisponível" readonly>
                                    </div>
                                    <div class="form-group col">
                                        <input type='text' class="btn btn-danger col" name="SEX4" value="Indisponível" readonly>
                                    </div>
                                </div>
                                <div class="invalid-feedback ocultar font-100" id="ErroDisponibilidade"><b>ATENÇÃO!</b> É obrigatório selecionar pelo menos um horário na tabela acima para prosseguir.</div>
                                <small>Clique sobre os botões da linha e coluna correspondentes ao dia/horário desejado para alternar entre disponível e insdisponível.</small>
                            </div>
                        </div>
                        <div class="rodape">
                            <button class="btn btn-verde" id="Anterior03">Anterior</button>
                            <button class="btn btn-verde" id="Proximo03">Próximo</button>
                        </div>
                    </div>
                    <div id="DADOS_ADICIONAIS" class="d-none corpo">
                        <div class="conteudo">
                        <div class="titulo">Dados Adicionais</div>
                                <div class="subtitulo">Relação com o Cursinho PES</div>
                                    <div class="form-row">
                                        <div class="form-group col-auto pt-1-5">
                                            Qual a sua relação com o Cursinho PES?
                                        </div>
                                        <div class="form-group col-md-6">
                                            <select class="form-control" id="relacao_cursinho" name="relacao_cursinho">
                                                <option value="null" selected>Selecione...</option>
                                                <option value="Já fui professor do Cursinho PES">Já fui professor do Cursinho PES</option>
                                                <option value="Já fui gestor do Cursinho PES">Já fui gestor do Cursinho PES</option>
                                                <option value="Já fui aluno do cursinho PES">Já fui aluno do cursinho PES</option>
                                                <option value="Já dei palestra ou aula extra no Cursinho PES">Já dei palestra ou aula extra no Cursinho PES</option>
                                                <option value="Nenhuma">Nenhuma</option>
                                            </select>
                                        </div>
                                    </div>
                                <div class="subtitulo">Ocupação</div>
                                    <div class="form-row">
                                        <div class="form-group col-auto pt-1-5">
                                            Qual é a sua principal ocupação?
                                        </div>
                                        <div class="form-group col-md-6">
                                            <select class="form-control" id="ocupacao" name="ocupacao">
                                                <option value="null" selected>Selecione...</option>
                                                <option value="Estudante de graduação matriculado na UFSC">Estudante de graduação matriculado na UFSC</option>
                                                <option value="Estudante de graduação matriculado em outra universidade">Estudante de graduação matriculado em outra universidade</option>
                                                <option value="Estudante de pós-graduação">Estudante de pós-graduação</option>
                                                <option value="Servidor público ou técnico na UFSC">Servidor público ou técnico na UFSC</option>
                                                <option value="Servidor público em outra instituição">Servidor público em outra instituição</option>
                                                <option value="Empregado em empresa privada">Empregado em empresa privada</option>
                                                <option value="Professor da rede municipal/estadual">Professor da rede municipal/estadual</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="ALUNO_GRADUACAO" class="ocultar">
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <label for="curso"><b>Curso:</b></label>
                                                <select class="form-control" id="curso" name="curso">
                                                    <option value="null" selected>Selecione...</option>
                                                <?php
                                                    if(!empty($cursos)){
                                                        foreach($cursos as $valor){?>
                                                    <option value="<?php echo $valor['ID_CURSO']?>"><?php echo $valor['NOME']?></option>
                                                <?php   }
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="fase"><b>Fase*:</b></label>
                                                <input type="text" class="form-control" id="fase" name="fase">
                                            </div>
                                            <div class="form-group col-md-3 ocultar" id="MATRICULA">
                                                <label for="matricula"><b>Matrícula:</b></label>
                                                <input type="text" class="form-control" id="matricula" name="matricula">
                                            </div>
                                            <small>*Caso esteja fazendo matérias de várias fases, informe aquela em que você tem maior número de disciplinas matriculado.</small>
                                        </div>
                                    </div>
                                <div class="subtitulo">Atual Participação em outros projetos da UFSC</div>
                                    <p>Indique a seguir se atualmente você está participando, ou pretende participar em paralelo ao Cursinho, de alguma outra atividade da UFSC como monitoria, projeto de pesquisa ou extensão, 
                                        empresa junior, equipe de robótica, entre outros. Em caso afirmativo, indique a seguir o nome da atividade e a carga horária semanal.
                                    </p>
                                    <div class="form-row">
                                        <div class="form-group col-auto pt-1-5">
                                            Atualmente você participa ou pretende participar de outro projeto ligado a UFSC?
                                        </div>
                                        <div class="form-group col-3">
                                            <select class="form-control" id="outros_projetos" name="outros_projetos">
                                                <option value="null" selected>Selecione...</option>
                                                <option value="Sim">Sim</option>
                                                <option value="Nao">Não</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="OUTROS_PROJETOS" class="ocultar">
                                        <div id="INFO_PROJETOS">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label><b>Nome da atividade:</b></label>
                                                    <input type="text" class="form-control" name="nome_projeto0" placeholder="Digite o nome do projeto/atividade">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label><b>Carga horária (horas/semana):</b></label>
                                                    <input type="text" class="form-control" name="carga_horaria_projeto0" placeholder="Digite a carga horária">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback font-100 ocultar mb-3" id="ErroADDProjetos"><b>ATENÇÃO!</b> Você pode indicar no máximo 5 atividades. Se participar de mais atividades, dê preferência as que possuem maior carga horária.</div>
                                        <button class="btn btn-verde" id="ADD_PROJETO">Adicionar Projeto</button>
                                    </div>
                                <div class="subtitulo">Participação em outros projetos da UFSC</div>
                                    <p>Indique a seguir se você já participou no passado de algum projeto da UFSC, como monitoria, projeto de extensão ou pesquisa, empresa júnior, entre outros. 
                                        Em caso afirmativo, indique, sempre que possível, o nome do professor responsável pela atividade.
                                    </p>
                                    <div class="form-row">
                                        <div class="form-group col-auto pt-1-5">
                                            Você já participou de algum projeto ligado a UFSC? <small>(Projetos em que você já tenha sido desligado.)</small>
                                        </div>
                                        <div class="form-group col-3">
                                            <select class="form-control" id="outros_projetos_antigo" name="outros_projetos_antigo">
                                                <option value="null" selected>Selecione...</option>
                                                <option value="Sim">Sim</option>
                                                <option value="Nao">Não</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="OUTROS_PROJETOS_ANTIGO" class="ocultar">
                                        <div id="INFO_PROJETOS_ANTIGO">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label><b>Nome da atividade:</b></label>
                                                    <input type="text" class="form-control" name="nome_projeto_antigo0" placeholder="Digite o nome do projeto/atividade">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label><b>Professor responsável: </b><small>(Opcional)</small></label>
                                                    <input type="text" class="form-control" name="prof_projeto_antigo0" placeholder="Informe o professor responsável">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback font-100 ocultar mb-3" id="ErroADDProjetosAntigo"><b>ATENÇÃO!</b> Você pode indicar no máximo 5 atividades. Dê preferência as atividades que você participou por mais tempo.</div>
                                        <button class="btn btn-verde" id="ADD_PROJETO_ANTIGO">Adicionar Projeto</button>
                                    </div>
                                <div class="subtitulo">Trabalhos voluntários</div>
                                    <div class="form-row">
                                        <div class="form-group col-auto pt-1-5">
                                            Você já trabalho como voluntário? <small>(não precisa ter ligação com a UFSC)</small>
                                        </div>
                                        <div class="form-group col-3">
                                            <select class="form-control" id="voluntario" name="voluntario">
                                                <option value="null" selected>Selecione...</option>
                                                <option value="Sim">Sim</option>
                                                <option value="Nao">Não</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="TRABALHO_VOLUNTARIO" class="ocultar">
                                        <div class="form-group">
                                            <label for="exp_voluntario">Conte um pouco sobre a sua experiência.</label>
                                            <textarea class="form-control" rows="3" id="exp_voluntario" name="exp_voluntario" maxlength="1024"></textarea>
                                        </div>
                                    </div>
                                <div class="subtitulo">Como você ficou sabendo do processo seletivo?</div>
                                    <p>Selecione na lista a seguir atravès de quais meios de comunicação você tomou conhecimento do processo seletivo. Selecione todas as respostas aplicáveis.</p>
                                    <div id="PESQUISA_DIVULGACAO">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="divulgacao_instagram" name="divulgacao_instagram">
                                                    <label class="custom-control-label" for="divulgacao_instagram">Instagram</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="divulgacao_facebook" name="divulgacao_facebook">
                                                    <label class="custom-control-label" for="divulgacao_facebook">Facebook</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="divulgacao_cartaz" name="divulgacao_cartaz">
                                                    <label class="custom-control-label" for="divulgacao_cartaz">Cartaz nos murais da UFSC</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="divulgacao_sala" name="divulgacao_sala">
                                                    <label class="custom-control-label" for="divulgacao_sala">Passaram na minha sala avisar</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="divulgacao_email" name="divulgacao_email">
                                                    <label class="custom-control-label" for="divulgacao_email">E-mail</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="divulgacao_amigo_familiar" name="divulgacao_amigo_familiar">
                                                    <label class="custom-control-label" for="divulgacao_amigo_familiar">Indicação de amigo/familiar</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="divulgacao_hall" name="divulgacao_hall">
                                                    <label class="custom-control-label" for="divulgacao_hall">Divulgação no Hall</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
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
                            <button class="btn btn-verde" id="Anterior04">Anterior</button>
                            <button class="btn btn-verde" id="Proximo04">Próximo</button>
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
                                <div id="INFO_ACADEMICAS" class="ocultar">
                                    <div class="subtitulo">Informações acadêmicas</div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nome"><b>Curso de graduação:</b></label>
                                                <input type="text" class="form-control" id="cursoREV" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="sobrenome"><b>Fase:</b></label>
                                                <input type="text" class="form-control" id="faseREV" readonly>
                                            </div>
                                            <div class="form-group col-md-3 ocultar" id="MATRICULA_REV">
                                                <label for="sexo"><b>Matrícula:</b></label>
                                                <input type="text" class="form-control" id="matriculaREV" readonly>
                                            </div>
                                        </div>
                                </div>
                                <div class="subtitulo">Matérias selecionadas</div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="nome"><b>1º Opção:</b></label>
                                            <input type="text" class="form-control" id="materia01REV" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="sobrenome"><b>2º Opção:</b></label>
                                            <input type="text" class="form-control" id="materia02REV" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="sexo"><b>3º Opção:</b></label>
                                            <input type="text" class="form-control" id="materia03REV" readonly>
                                        </div>
                                    </div>   
                                <div class="subtitulo">Confirmação</div>
                                    <p>Se as informações acima estiverem corretas, elecione a caixa abaixo para confirmar.</p>
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="ConfirmacaoRevisao" name="ConfirmacaoRevisao">
                                        <label class="custom-control-label" for="ConfirmacaoRevisao">Confirmo que as informações apresentadas acima estão corretas.</label>
                                    </div>
                                    <div class="invalid-feedback font-100 ocultar" id="ErroConfirmacaoRevisao"><b>ATENÇÃO!</b> Você precisa confirmar que as informações apresentadas acima estão corretas.</div>
                        </div>
                        <div class="rodape">
                            <button class="btn btn-verde" id="Anterior05">Anterior</button>
                            <button class="btn btn-verde" id="Proximo05">Enviar Inscrição</button>
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
            <!-- Modal Mensagem Erro Preenchimento -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MensagemErro" id="BotaoMensagemErro" hidden></button>
            <div class="modal fade" id="MensagemErro" tabindex="-1" role="dialog" aria-labelledby="TituloMensagemErro" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-erro-form">
                            <h5 class="modal-title text-center w-100" id="TituloMensagemErro">ATENÇÃO!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <p class="mb-1">Existem campos preenchidos incorretamente nessa página.</p>
                                <p>Preencha corretamente todos os campos antes de prosseguir.</p>
                            </div>
                        </div>
                        <div class="modal-footer bg-bordo-pes">
                            <button type="button" class="btn btn-verde btn-ativo" data-dismiss="modal">Entendi</button>
                        </div>
                    </div>
                </div>
            </div><!--/Modal Mensagem Erro Preenchimento -->
        </main><!--/Conteúdo da página-->
        
        <!--Javascript-->
        <script src="/scripts/js/libs/jquery-3.4.1.min.js"></script>
        <script src="/scripts/js/libs/bootstrap.min.js"></script>
        <script src="/scripts/js/libs/jquery.maskedinput.js"></script>
        <script src="/scripts/js/definicoes-maskedinput.js"></script>
        <script src="/scripts/js/libs/jquery.validate.min.js"></script>
        <script src="/scripts/js/validacao/inscricao-PSProfs.js"></script>
        <script src="/scripts/js/pagina/inscricao-PSProfs.js"></script>
<?php }?>
    </body>
</html>
<?php 
    $disciplinas->close();
    $cursos->close();
?>