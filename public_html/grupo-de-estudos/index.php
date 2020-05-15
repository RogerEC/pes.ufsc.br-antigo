<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Grupo de Estudos Cursinho PES</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="robots" content="index, follow">
        <?php $path = $_SERVER['DOCUMENT_ROOT']; require_once($path."/scripts/php/componentes/links-head.php"); //Links padrões do head?>
    </head>

    <body>
        
        <?php require_once($path."/scripts/php/componentes/barra-navegacao.php"); //Barra de Navegação?>

        <main><!--Conteúdo da página-->
            <div class="container">
                <div class="text-center w-100 pt-4 pb-4">
                    <h1 class="mb-5">Grupo de Estudos Cursinho PES</h1>
                    <p class="text-justify">Tendo em vista a suspensão das atividades na UFSC em decorrência da pandemia de Covid-19, o Cursinho PES organizou um Grupo de Estudos para auxiliar 
                        de maneira remota os candidatos que tenham interesse em prestar o ENEM ou o vestibular das UFSC a se prepararem para as provas.</p>
                    <p class="text-justify">Foi criada uma turma no Google Sala de Aula onde os candidatos terão acesso a um cronograma de conteúdos semanais, uma indicação de materiais disponíveis 
                        na internet para estudar os assuntos propostos e um espaço para tirar dúvidas diretamente com os professores do Cursinho PES de maneira online através de videoconferências.</p>
                    <p class="text-justify">Pode se cadastrar no grupo de estudo qualquer pessoa de Araranguá-SC e cidades próximas que tenha vontade de se prepara para a realização do ENEM ou Vestibular UFSC, 
                        basta preencher a ficha de inscrição clicando no botão "Realizar Cadastro" abaixo.</p>
                    <p class="text-justify">Apenas relembrando, o Cursinho PES é um projeto de extensão inteiramente voluntário da UFSC Campus Araranguá e conta com um número limitado de colaboradores. 
                        Inicialmente não será estipulado limite no número de participantes do Grupo de Estudos, mas caso haja elevada demanda pelo grupo, será priorizado o atendimento individual aos alunos inscritos 
                        no <b>Processo Seletivo de Alunos 2020</b> e que se enquadrem dentro dos critérios de seleção estipulados no <b>EDITAL Nº 03/PES/2020</b> disponível 
                        <a href="/processo-seletivo/alunos/2020/Edital_N03PES2020.pdf" target="_blank">nesse link</a>.</p>
                    <p class="text-justify">Dúvidas podem ser encaminhadas para o e-mail <b>grupodeestudos@pes.ufsc.br</b> ou nas nossas redes sociais no 
                    <a href='https://www.facebook.com/PES.UFSC/'>Facebook</a> ou <a href='https://www.instagram.com/cursinhopes/'>Instagram</a>.</p>
                </div>
                <div class="text-center w-100 pb-4">
                    <button type="button" class="btn btn-verde mt-2" id="BotaoCadastrar">
                        Realizar Cadastro no Grupo de Estudos
                    </button>
                </div>
            </div>
        
            <!-- Modal Realizar Cadastro -->
            <button type="button" class="btn btn-verde" data-toggle="modal" data-target="#RealizarCadastro" id="BotaoCadastrarOculto" hidden></button>
            <div class="modal fade" id="RealizarCadastro" tabindex="-1" role="dialog" aria-labelledby="TituloRealizarCadastro" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-bordo-pes">
                            <h5 class="modal-title" id="TituloRealizarCadastro">Cadastro Monitorias Cursinho PES</h5>
                            <button type="button" class="close cancelar-formulario white-color" data-dismiss="modal" aria-label="Fechar" value="#FormularioRealizarCadastro">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="cadastro.php" method="POST" class="container-fluid" id="FormularioRealizarCadastro">
                                <div class="form-row">
                                    <div class="form-group w-100">
                                        <label for="cpf_insc"><b>Número do CPF:</b></label>
                                        <input type="text" class="form-control cpf" id="cpf_insc" name="cpf" placeholder="___.___.___-__">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer bg-bordo-pes">
                            <button type="button" class="btn btn-bordo cancelar-formulario" data-dismiss="modal" id="BotaoCancelarCadastrar" value="#FormularioRealizarCadastro">Cancelar</button>
                            <button type="button" class="btn btn-verde" id="EnviarRealizarCadastro">Realizar Cadastro</button>
                        </div>
                    </div>
                </div>
            </div><!--/Modal Realizar Cadastro -->

        </main><!--/Conteúdo da página-->

        <?php require_once($path."/scripts/php/componentes/rodape.php"); //Rodapé?>
        
        <!--Javascript-->
        <script src="/scripts/js/libs/jquery-3.4.1.min.js"></script>
        <script src="/scripts/js/libs/bootstrap.min.js"></script>
        <script src="/scripts/js/libs/jquery.maskedinput.js"></script>
        <script src="/scripts/js/definicoes-maskedinput.js"></script>
        <script src="/scripts/js/libs/jquery.validate.min.js"></script>
        <script src="/scripts/js/pagina/grupo-estudos-index.js"></script>
    </body>
</html>