<?php
    /*ini_set('default_charset','utf-8');
    $path = $_SERVER['DOCUMENT_ROOT'];

    if(!empty($_POST["cpf"]) && isset($_POST["cpf"])){
        
        $cpf = $_POST["cpf"];

        require_once($path."/scripts/php/banco/conexao.php");

        $cpf2 = preg_replace('/[^0-9]/', '', $_POST["cpf"]);

        $resultado = $conexao->query("SELECT ID_USUARIO FROM pes_usuario WHERE USUARIO = '{$cpf2}' LIMIT 1");

        if($resultado->num_rows==1){
            $inscrito = 1;
        }else{
            $inscrito = 0;
        }
        $resultado->close();
    }else{
        $erro=401;
        include $path."/erro.php";
        exit;
    }

    $cursos = $conexao->query("SELECT NOME FROM pes_curso");*/
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Formulário de Cadastro - Grupo de Estudos</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="robots" content="none">
        <link rel="stylesheet" type="text/css" href="/scripts/css/no-scrollbar.css">
        <?php $path = $_SERVER['DOCUMENT_ROOT']; require_once($path."/scripts/php/componentes/links-head.php"); //Links padrões do head?>
    </head>

    <body>
        <div class="w-100 mt-5 mb-5 text-center">
            <h1>Inscrições Encerradas</h1>
        </div>
        <div class="w-100 text-center">
            <p><a href="/">Clique aqui</a> para voltar a página inicial do site.</p>
        </div>
        <?php /*
        <main class="pt-0 w-100 h-100" id="FormularioInscricao"><!--Conteúdo da página-->
            <!-- Barra de navegação lateral -->
            <div class="coluna-barra-lateral d-none d-sm-block bg-inscricao">
                <div class="container-fluid" id="BotoesBarraLateral">
                    <img class="pt-3 pb-3" src="/img/logo-circular.png" width="100%">
                    <button class="btn btn-verde w-100 mb-3 btn-ativo" id="BotaoInicio">Realizar Cadastro</button>
                    <button class="btn btn-verde w-100 mb-3 btn-ativo ocultar" id="BotaoFinalizar">Finalizar Cadastro</button>
                </div>
            </div><!-- /Barra de navegação lateral -->
            <!-- Coluna do formulário -->
            <div class="coluna-formulario container-fluid">
                <form action="" method="POST" id="FormularioAlunos">
                    <div id="DADOS_PESSOAIS" class="corpo">
                        <div class="conteudo">
                            <div class="titulo">Informações de Cadastro</div>
                                <div class="subtitulo">Informações Pessoais</div>
                                    <div class="form-row">
                                        <div class="form-group col-sm">
                                            <label for="nome"><b>Nome:</b></label>
                                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" maxlength="30">
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="sobrenome"><b>Sobrenome:</b></label>
                                            <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome" maxlength="60">
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
                                            <label for="cpf"><b>CPF:</b></label>
                                            <input type="text" class="form-control cpf" id="cpf" name="cpf" value="<?php echo $cpf?>" readonly>
                                            <input type="text" id="inscrito" name="inscrito" value="<?php echo $inscrito?>" hidden>
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
                                <div class="subtitulo">Informações de contato</div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="email"><b>E-mail:</b></label>
                                            <input type="email" class="form-control" id="email" name="email" value="" maxlength="60">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="telefone"><b>Telefone (WhatsApp):</b></label>
                                            <input type="text" class="form-control telefone" id="telefone" name="telefone" placeholder="(__) ____-____">
                                        </div>
                                    </div>
                                <div class="subtitulo">Informações de endereço</div>
                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label for="bairro"><b>Bairro:</b></label>
                                            <input type="text" class="form-control" id="bairro" name="bairro" maxlength="60">
                                        </div>
                                        <div class="form-row col-md-7">
                                            <div class="form-group col-9">
                                                <label for="cidade"><b>Cidade:</b></label>
                                                <input type="text" class="form-control" id="cidade" name="cidade" maxlength="60">
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="uf"><b>UF:</b></label>
                                                <select class="form-control" id="uf" name="uf">
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
                                <div class="subtitulo">Dados escolares</div>
                                    <div class="form-row">
                                        <div class="form-group col-auto pt-1-5 mr-4">
                                            Com relação ao Ensino Médio, atualmente você: 
                                        </div>
                                        <div class="form-group col-md-5">
                                            <select class="form-control" id="tipo_aluno" name="tipo_aluno">
                                                <option value="null" selected>Selecione...</option>
                                                <option value="Está cursando o ensino médio">Está cursando o ensino médio</option>
                                                <option value="Já concluiu o ensino médio">Já concluiu o ensino médio</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="DADOS_ESCOLARES">
                                        <div id="DADOS_ESTUDANTE" class="ocultar">
                                            <div class="form-row">
                                                <div class="form-group col-md-5">
                                                    <label for="nome_escola"><b>Nome da escola:</b></label>
                                                    <input type="text" class="form-control" id="nome_escola" name="nome_escola" maxlength="60">
                                                </div>
                                                <div class="form-row col-md-7">
                                                    <div class="form-group col-9">
                                                        <label for="cidade"><b>Cidade:</b></label>
                                                        <input type="text" class="form-control" id="cidade_escola" name="cidade_escola" maxlength="60">
                                                    </div>
                                                    <div class="form-group col-3">
                                                        <label for="uf_escola"><b>UF:</b></label>
                                                        <select class="form-control" id="uf" name="uf_escola">
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
                                    <div class="form-row">
                                        <div class="form-group col-auto pt-1-5 mr-3">
                                            Em qual tipo de escola você estuda (ou estudou) o ensino médio? 
                                        </div>
                                        <div class="form-group col-md-4">
                                            <select class="form-control" id="tipo_escola" name="tipo_escola">
                                                <option value="null" selected>Selecione...</option>
                                                <option value="Inteiramente em escola pública">Inteiramente em escola pública</option>
                                                <option value="Inteiramente em escola particular (com bolsa)">Inteiramente em escola particular (com bolsa)</option>
                                                <option value="Inteiramente em escola particular (sem bolsa)">Inteiramente em escola particular (sem bolsa)</option>
                                                <option value="Parte em escola pública e parte em escola particular (com bolsa)">Parte em escola pública e parte em escola particular (com bolsa)</option>
                                                <option value="Parte em escola pública e parte em escola particular (sem bolsa)">Parte em escola pública e parte em escola particular (sem bolsa)</option>
                                                <option value="Parte em escola particular (sem bolsa) e parte em escola particular (com bolsa)">Parte em escola particular (sem bolsa) e parte em escola particular (com bolsa)</option>
                                            </select>
                                        </div>
                                    </div>
                                <div class="subtitulo">Rotina de estudos</div>
                                    <div class="form-row">
                                        <p>Para responder as questões dessa seção, desconsidere o tempo que você passa em aula ou fazendo atividades diretamente ligadas a ela.</p>
                                        <div class="form-group col-auto pt-1-5 mr-4">
                                            Você possui uma rotina de estudos em casa?
                                        </div>
                                        <div class="form-group col-md-6">
                                            <select class="form-control" name="rotina_estudo">
                                                <option value="null" selected>Selecione...</option>
                                                <option value="Não, não estudo em casa">Não, não estudo em casa</option>
                                                <option value="Não, só estudo quando tem prova ou trabalho">Não, só estudo quando tem prova ou trabalhos</option>
                                                <option value="Sim, sempre separo um tempo do meu dia/semana para isso">Sim, sempre separo um tempo do meu dia/semana para isso</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-auto pt-1-5 mr-3">
                                            Quantos dias por semana você reserva para estudar em casa?
                                        </div>
                                        <div class="form-group col-md-5">
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
                                        <div class="form-group col-md-5">
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
                                <div class="subtitulo">Vestibulares e Universidade</div>
                                    <div class="form-row">
                                        <div class="form-group col-auto pt-1-5 mr-5">
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
                                        <div class="form-group col-auto pt-1-5 mr-4">
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
                        </div>
                        <div class="rodape">
                            <button class="btn btn-verde" id="CancelarCadastro">Cancelar</button>
                            <button class="btn btn-verde" id="EnviarCadastro">Enviar Cadastro</button>
                        </div>
                    </div>
                </form>
                <div id="FINALIZAR" class="d-none corpo">
                    <div class="conteudo">
                        <div class="titulo">Finalizar Cadastro</div>
                        <div id="SALVANDO_RESPOSTA">
                            <p>Estamos salvando suas respostas.</p>
                            <p>Aguarde...</p>
                        </div>
                        <div id="FINALIZAR_SUCESSO" class="ocultar">
                            <p>Seu cadastro no Grupo de Estudos foi salvo com sucesso!</p>
                            <P>Enviamos uma confirmação de inscrição para o endereço de e-mail informado.</P>
                            <p>Em até 24h você deve receber um novo e-mail com o link de convite para o Grupo de Estudos no Google Sala de Aula.</p>
                        </div>
                        <div id="FINALIZAR_ERRO_EMAIL" class="ocultar">
                            <p>Seu cadastro no Grupo de Estudos foi salvo com sucesso!</p>
                            <p>Mas ocorreu um erro ao tentar enviar a confirmação de inscrição para o endereço de e-mail fornecido.</p>
                            <p>Entre em contato com a equipe do Cursinho PES pelo e-mail <b>grupodeestudos@pes.ufsc.br</b> e informe o código de erro: <b>ERROR-001</b>.</p>
                        </div>
                        <div id="FINALIZAR_ERRO_GRAVE" class="ocultar">
                            <p>Não foi possível concluir seu cadastro no Grupo de Estudos.</p>
                            <p>Recomendamos tentar realizar a inscrição novamente mais tarde.</p>
                            <p>Se o erro persistir entre em contato com a equipe do Cursinho PES pelo e-mail <b>grupodeestudos@pes.ufsc.br</b> e informe o código de erro: <b>ERROR-002</b>.</p>
                        </div>
                        <div id="FINALIZAR_ERRO_SERVIDOR" class="ocultar">
                            <p>Não foi possível concluir seu cadastro no Grupo de Estudos.</p>
                            <p>Houve erro na comunicação com o nosso servidor.</p>
                            <p>Recomendamos tentar realizar a inscrição novamente mais tarde.</p>
                            <p>Se o erro persistir entre em contato com a equipe do Cursinho PES pelo e-mail <b>grupodeestudos@pes.ufsc.br</b> e informe o código de erro: <b>ERROR-003</b>.</p>
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
        <script src="/scripts/js/libs/jquery-3.4.1.min.js"></script>
        <script src="/scripts/js/libs/bootstrap.min.js"></script>
        <script src="/scripts/js/libs/api_viacep.js"></script>
        <script src="/scripts/js/libs/jquery.maskedinput.js"></script>
        <script src="/scripts/js/definicoes-maskedinput.js"></script>
        <script src="/scripts/js/libs/jquery.validate.min.js"></script>
        <script src="/scripts/js/validacao/cadastro-GrupoEstudos.js"></script>
        <script src="/scripts/js/pagina/cadastro-GrupoEstudos.js"></script>
        */?>
    </body>
</html>
<?php 
    //$cursos->close();
    //$conexao->close();
?>