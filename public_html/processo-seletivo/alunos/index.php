<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Processo Seletivo de Alunos - Cursinho PES</title>
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
                    <h1>Processo Seletivo de Alunos 2021</h1>
                    <h4>Grupo de Estudos Online</h4>
                </div>
                <p class="text-justify mb-2">Em 2021, devido as consequências causadas pela pandêmia de COVID-19 as atividades do Cursinho PES continuarão em formato remoto, sendo oferecido aos alunos o Grupo de Estudos Online com início das aulas em 24 de maio de 2021 e término previsto para dezembro de 2021, sendo que as aulas serão gravadas e disponibilizadas no canal do YouTube do Cursinho PES.</p>
                <p class="text-justify ">Podem se inscrever para participar do grupo de estudo todo o candidato que esteja cursando ou já  tenha concluído, a qualquer ano, o ensino médio inteiramente em escola pública ou em colégio particular com bolsa integral. Mais informações sobre os critérios de seleção podem ser conferidas no edital disponível abaixo. Para se inscrever basta clicar no botão <b>"Realizar Inscrição".</b></p>
                    <p class="text-justify"><b>PRAZO PARA INSCRIÇÃO:</b> de 07/03/2021 até 16/05/2021 às 23:59:59. Após esse prazo não serão aceitas novas inscrições.</p>
                    <p class="text-justify"><b>Gravações das aulas: </b> <a href="https://www.youtube.com/channel/UC6rD7xpvC-YvUtkrP6KhyNA" target="_blank">Disponíveis no canal do Cursinho PES no YouTube</a></p>
                    <p class="text-justify">Dúvidas podem ser encaminhadas para o e-mail <b>grupodeestudos@pes.ufsc.br</b> ou nas nossas redes sociais no 
                    <a href='https://www.facebook.com/PES.UFSC/'>Facebook</a> ou <a href='https://www.instagram.com/cursinhopes/'>Instagram</a>.</p>
                <!--<p class="text-justify">As inscrições no Processo Seletivo de Alunos 2020 foram canceladas, mas você ainda pode se inscrever no Grupo de Estudos online 
                    que sera oferecido pelo Cursinho PES ao longo desse ano <b>até o dia 01/08/2020</b>. Clique no botão "Mais informações sobre o Grupo de Estudos" para saber mais.
                </p>-->
                <div class="text-center w-100 pt-3 pb-3">
                    <button type="button" class="btn btn-verde mt-2" id="BotaoCadastrar">
                        Realizar Inscrição no Grupo de Estudos
                    </button>
                    <!--<a href="/grupo-de-estudos" class="btn btn-verde ml-2 mt-2">Mais informações sobre o Grupo de Estudos</a>
                    <button type="button" class="btn btn-verde mt-2" id="BotaoAcompanhar" disabled hidden>
                        Acompanhar Inscrição
                    </button>-->
                </div>
                <p><h5>Documentos importantes:</h5></p>
                <p>[06/03/2021] <a href="/processo-seletivo/alunos/2021/Edital_N03PES2021.pdf" target="_blank">Edital Nº 03/PES/2021 - Processo Seletivo de Alunos 2021</a></p>
                <!--<p>[07/07/2020] <a href="/processo-seletivo/alunos/2020/Cancelamento_Edital_N03PES2020.pdf" target="_blank">Cancelamento do Edital Nº 03/PES/2020</a></p>
                <p>[16/03/2020] <a href="/processo-seletivo/alunos/2020/Suspensao_Edital_N03PES2020.pdf" target="_blank">Suspensão do Cronograma de Atividades para o Edital Nº 03/PES/2020</a></p>
                <p>[15/03/2020] <a href="/processo-seletivo/alunos/2020/Retificacao_Edital_N03PES2020.pdf" target="_blank">Retificação do Edital Nº 03/PES/2020</a></p>
                <p>[09/03/2020] <a href="/processo-seletivo/alunos/2020/Edital_N03PES2020.pdf" target="_blank">Edital Nº 03/PES/2020 - Processo Seletivo de Alunos 2020</a></p>
                <p>[09/03/2020] <a href="/processo-seletivo/alunos/2020/Calendario2020-Alunos.pdf" target="_blank">Anexo I - Calendário Letivo Cursinho PES 2020</a></p>-->
            </div>
        
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
        <script src="/scripts/js/libs/jquery.min.js"></script>
        <script src="/scripts/js/libs/bootstrap.min.js"></script>
        <script src="/scripts/js/libs/jquery.maskedinput.min.js"></script>
        <script src="/scripts/js/definicoes-maskedinput.js"></script>
        <script src="/scripts/js/libs/jquery.validate.min.js"></script>
        <script src="/scripts/js/pagina/grupo-estudosIndex.js?v1"></script>
    </body>
</html>