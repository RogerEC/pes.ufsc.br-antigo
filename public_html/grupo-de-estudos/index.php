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
                    <h1 class="mb-5">Grupo de Estudos Cursinho PES — 2ª Chamada</h1>
                    <p class="text-justify">Considerando a descisão da Universidade Federal de Santa Catarina em não retomar o ensino de forma presencial este ano 
                        (<a href="https://noticias.ufsc.br/2020/06/nota-oficial-ufsc-nao-retomara-ensino-presencial-em-2020/" target="_blank">link</a>), 
                        o Cursinho PES comunica que não irá realizar nenhuma atividade presencial em 2020, cancelando o Edital Nº 03/PES/2020 que tratava do Processo Seletivo de Alunos 2020. Durante esse ano 
                        entretanto, iremos manter um grupo de estudos online para auxiliar os estudantes que tenham interesse em prestar o ENEM ou o vestibular das UFSC a se prepararem para as provas.</p>
                    <p class="text-justify">Para não prejudicar os candidatos que estavam a espera do retorno das atividades normais, iremos abrir uma segunda chamada de inscrições para o Grupo de Estudos.
                        Podem se inscrever qualquer pessoa com 16 anos completos ou mais que tenha vontade de se prepara para a realização do ENEM ou do Vestibular UFSC. Para tal, basta preencher a ficha de 
                        inscrição clicando no botão "Realizar Inscrição no Grupo de Estudos.</p>
                    <p class="text-justify"><b>PRAZO PARA INSCRIÇÃO NA 2ª CHAMADA:</b> de 11/07/2020 até 01/08/2020 às 23:59:59. Após esse prazo não serão aceitas novas inscrições.</p>
                    <p class="text-justify"><b>Informações adicionais:</b> <a href="Funcionamento-GEPES.pdf" target="_blank">Informações adicionais sobre o Grupo de Estudos do Cursinho PES</a></p>
                    <p class="text-justify"><b>Gravações das monitorias:</b> <a href="https://www.youtube.com/channel/UC6rD7xpvC-YvUtkrP6KhyNA" target="_blank">Disponíveis no canal no YouTube do Cursinho PES</a></p>
                    <p class="text-justify">Dúvidas podem ser encaminhadas para o e-mail <b>grupodeestudos@pes.ufsc.br</b> ou nas nossas redes sociais no 
                    <a href='https://www.facebook.com/PES.UFSC/'>Facebook</a> ou <a href='https://www.instagram.com/cursinhopes/'>Instagram</a>.</p>
                </div>
                <div class="text-center w-100 pb-4">
                    <button type="button" class="btn btn-verde mt-2" id="BotaoCadastrar">
                        Realizar Inscrição no Grupo de Estudos
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
        <script src="/scripts/js/pagina/grupo-estudosIndex.js"></script>
    </body>
</html>