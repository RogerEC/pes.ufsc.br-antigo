<?php 
    $versao_ps = "2021-1";
    $ano = "2021";
    $nome_edital = "Edital Edital Nº 01/PES/2021 - Processo Seletivo de Gestores 2021-1";
    $link_edital = "/processo-seletivo/gestao/2020/Edital_N01PES2021.pdf";
    $data_inicio = "01/03/2021";
    $data_final = "02/05/2021";
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Processo Seletivo de Gestores - Cursinho PES</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="robots" content="index, follow">
        <?php $path = $_SERVER['DOCUMENT_ROOT']; require_once($path."/scripts/php/componentes/links-head.php"); //Links padrões do head?>
    </head>

    <body>
        
        <?php require_once($path."/scripts/php/componentes/barra-navegacao.php"); //Barra de Navegação?>

        <main><!--Conteúdo da página-->

            <div class="container">
            <div class="text-center w-100 pt-5 pb-5">
                    <h1>Processo Seletivo de Gestores <?=$versao_ps;?></h1>
                </div>
                <p class="text-justify">Processo seletivo para selecionar voluntários para atuar na organização e gestão do Cursinho PES durante o ano de <?=$ano;?>.
                    Apesar de ser um projeto de Extensão da Universidade Federal de Santa Catarina, não é necessário ter ligação prévia com a universidade para particpar.
                    Mais informações sobre os critérios de seleção podem ser conferidas no edital disponível abaixo. Para se inscrever basta clicar no botão <b>"Realizar Inscrição".</b></p>
                <p class="pb-4"><b>PRAZO DE INSCRIÇÃO:</b> de <?=$data_inicio;?> até <?=$data_final;?> às 23h59min.</p>
                <div class="text-center w-100 pb-4">
                    <button type="button" class="btn btn-verde mt-2" id="BotaoInscrever">
                        Realizar Inscrição
                    </button>
                    <button type="button" class="btn btn-verde mt-2" id="BotaoAcompanhar" disabled hidden>
                        Acompanhar Inscrição
                    </button>
                </div>
                <p><h5>Documentos importantes:</h5></p>
                <p>[01/03/2021] <a href="<?=$link_edital;?>" target="_blank"><?=$nome_edital;?></a></p>
                <!--<p>[20/07/2020] <a href="/processo-seletivo/gestao/2020/Edital_N04PES2020-2.pdf" target="_blank">Prorrogação do prazo de inscrição para o Edital Nº 04/PES/2020</a></p>
                <p>[13/07/2020] <a href="/processo-seletivo/gestao/2020/Edital_N04PES2020.pdf" target="_blank">Edital Nº 04/PES/2020 - Processo Seletivo de Gestores 2020-2</a></p>
                <p>[13/07/2020] <a href="/processo-seletivo/gestao/2020/Edital_N04PES2020-Anexo_I.pdf" target="_blank">Anexo I - Organização interna e atribuições de cada setor</a></p>-->
                <!--<p>[07/07/2020] <a href="/processo-seletivo/gestao/2020/Cancelamento_Edital_N01PES2020.pdf" target="_blank">Cancelamento do Edital Nº 01/PES/2020</a></p>
                <p>[16/03/2020] <a href="/processo-seletivo/gestao/2020/Suspensao_Edital_N01PES2020.pdf" target="_blank">Suspensão do Cronograma de Atividades para o Edital Nº 01/PES/2020</a></p>
                <p>[13/03/2020] <a href="/processo-seletivo/gestao/2020/Edital_N01PES2020-2.pdf" target="_blank">Prorrogação do prazo de inscrição para o Edital Nº 01/PES/2020</a></p>
                <p>[07/03/2020] <a href="/processo-seletivo/gestao/2020/Edital_N01PES2020.pdf" target="_blank">Edital Nº 01/PES/2020 - Processo Seletivo de Gestores 2020-1</a></p>
                <p>[07/03/2020] <a href="/processo-seletivo/gestao/2020/Edital_N01PES2020-Anexo_I.pdf" target="_blank">Anexo I - Organização interna e atribuições de cada setor</a></p>-->
            </div>

            <!-- Modal Realizar inscrição -->
            <button type="button" class="btn btn-verde" data-toggle="modal" data-backdrop="static" data-target="#RealizarInscricao" id="BotaoInscreverOculto" hidden></button>
            <div class="modal fade" id="RealizarInscricao" tabindex="-1" role="dialog" aria-labelledby="TituloRealizarInscricao" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-bordo-pes">
                            <h5 class="modal-title" id="TituloRealizarInscricao">Inscrição no Processo Seletivo</h5>
                            <button type="button" class="close cancelar-formulario white-color" data-dismiss="modal" aria-label="Fechar" value="#FormularioRealizarInscricao">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="ficha-inscricao.php" method="POST" class="container-fluid" id="FormularioRealizarInscricao">
                                <div class="form-row">
                                    <div class="form-group w-100">
                                        <label for="cpf_insc"><b>Número do CPF:</b></label>
                                        <input type="text" class="form-control cpf" id="cpf_insc" name="cpf" placeholder="___.___.___-__">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer bg-bordo-pes">
                            <button type="button" class="btn btn-bordo cancelar-formulario" data-dismiss="modal" id="BotaoCancelarInscrever" value="#FormularioRealizarInscricao">Cancelar</button>
                            <button class="btn btn-verde" id="EnviarRealizarInscricao" value="gestao">Enviar Inscrição</button>
                        </div>
                    </div>
                </div>
            </div><!--/Modal Realizar inscrição -->
        </main><!--/Conteúdo da página-->

        <?php require_once($path."/scripts/php/componentes/rodape.php"); //Rodapé?>
        
        <!--Javascript-->
        <script src="/scripts/js/libs/jquery.min.js"></script>
        <script src="/scripts/js/libs/bootstrap.min.js"></script>
        <script src="/scripts/js/libs/jquery.maskedinput.min.js"></script>
        <script src="/scripts/js/definicoes-maskedinput.js"></script>
        <script src="/scripts/js/libs/jquery.validate.min.js"></script>
        <script src="/scripts/js/validacao-PS.js"></script>
        <script src="/scripts/js/pagina/inicio-PSs.js"></script>
    </body>
</html>