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
                <div class="text-center w-100 pt-5 pb-5">
                    <h1>Processo Seletivo de Alunos 2021</h1>
                </div>
                <p class="text-justify">Inscrições devem começar em breve. Fique atento as nossas redes sociais no <a href='https://www.facebook.com/cursinhopes/'>Facebook</a> ou <a href='https://www.instagram.com/cursinhopes/'>Instagram</a> para mais informações.</p>
                <!--<p class="text-justify">As inscrições no Processo Seletivo de Alunos 2020 foram canceladas, mas você ainda pode se inscrever no Grupo de Estudos online 
                    que sera oferecido pelo Cursinho PES ao longo desse ano <b>até o dia 01/08/2020</b>. Clique no botão "Mais informações sobre o Grupo de Estudos" para saber mais.
                </p>-->
                <div class="text-center w-100 pt-3 pb-5">
                    <button type="button" class="btn btn-verde mt-2" id="BotaoInscrever" disabled>
                        Realizar Inscrição (Em breve)
                    </button>
                    <!--<a href="/grupo-de-estudos" class="btn btn-verde ml-2 mt-2">Mais informações sobre o Grupo de Estudos</a>
                    <button type="button" class="btn btn-verde mt-2" id="BotaoAcompanhar" disabled hidden>
                        Acompanhar Inscrição
                    </button>-->
                </div>
                <p><h5>Documentos importantes:</h5></p>
                <p>[01/03/2021] Edital será publicado em breve.<!--<a href="/processo-seletivo/alunos/2020/Cancelamento_Edital_N03PES2020.pdf" target="_blank">Cancelamento do Edital Nº 03/PES/2020</a>--></p>
                <!--<p>[07/07/2020] <a href="/processo-seletivo/alunos/2020/Cancelamento_Edital_N03PES2020.pdf" target="_blank">Cancelamento do Edital Nº 03/PES/2020</a></p>
                <p>[16/03/2020] <a href="/processo-seletivo/alunos/2020/Suspensao_Edital_N03PES2020.pdf" target="_blank">Suspensão do Cronograma de Atividades para o Edital Nº 03/PES/2020</a></p>
                <p>[15/03/2020] <a href="/processo-seletivo/alunos/2020/Retificacao_Edital_N03PES2020.pdf" target="_blank">Retificação do Edital Nº 03/PES/2020</a></p>
                <p>[09/03/2020] <a href="/processo-seletivo/alunos/2020/Edital_N03PES2020.pdf" target="_blank">Edital Nº 03/PES/2020 - Processo Seletivo de Alunos 2020</a></p>
                <p>[09/03/2020] <a href="/processo-seletivo/alunos/2020/Calendario2020-Alunos.pdf" target="_blank">Anexo I - Calendário Letivo Cursinho PES 2020</a></p>-->
            </div>
        
            <!-- Modal Realizar inscrição -->
            <button type="button" class="btn btn-verde" data-toggle="modal" data-target="#RealizarInscricao" id="BotaoInscreverOculto" hidden></button>
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
                                        <label for="email_insc"><b>Endereço de e-mail:</b></label>
                                        <input type="email" class="form-control" id="email_insc" name="email" placeholder="meu.email@exemplo.com">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group w-100">
                                        <label for="cpf_insc"><b>Número do CPF:</b></label>
                                        <input type="text" class="form-control cpf" id="cpf_insc" name="cpf" placeholder="___.___.___-__">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group w-100">
                                        <label for="senha_insc"><b>Crie uma senha:</b></label>
                                        <input type="password" class="form-control" id="senha_insc" name="senha">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group w-100">
                                        <label for="senha_insc2"><b>Repita a sua senha:</b></label>
                                        <input type="password" class="form-control" id="confirme_senha" name="confirme_senha">
                                    </div>
                                </div>
                                <input id="EnviarRealizarInscricao" type="submit" hidden>
                            </form>
                        </div>
                        <div class="modal-footer bg-bordo-pes">
                            <button type="button" class="btn btn-bordo cancelar-formulario" data-dismiss="modal" id="BotaoCancelarInscrever" value="#FormularioRealizarInscricao">Cancelar</button>
                            <label class="btn btn-verde" for="EnviarRealizarInscricao">Enviar Inscrição</label>
                        </div>
                    </div>
                </div>
            </div><!--/Modal Realizar inscrição -->

            <!-- Modal Acompanhar Inscrição -->
            <button type="button" class="btn btn-verde" data-toggle="modal" data-target="#AcompanharInscricao" id="BotaoAcompanharOculto" hidden></button>
            <div class="modal fade" id="AcompanharInscricao" tabindex="-1" role="dialog" aria-labelledby="TituloAcompanharInscricao" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-bordo-pes">
                            <h5 class="modal-title" id="TituloIniciarInscricao">Acompanhar sua inscrição no Processo Seletivo</h5>
                            <button type="button" class="close cancelar-formulario white-color" data-dismiss="modal" aria-label="Fechar" value="#FormularioAcompanharInscricao">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/processo-seletivo/acompanhar-inscricao.php" method="POST" class="container-fluid" id="FormularioAcompanharInscricao">
                                <div class="form-row">
                                    <div class="form-group w-100">
                                        <label for="cpf_login"><b>Usuário (Nº CPF):</b></label>
                                        <input type="text" class="form-control cpf" id="cpf_login" name="cpf" placeholder="___.___.___-__">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group w-100">
                                        <label for="senha_login"><b>Senha:</b></label>
                                        <input type="password" class="form-control" id="senha_login" name="senha">
                                        <div class="w-100">
                                            <small class="link-form-insc float-right" id="EsqueceuSenha">Esqueceu sua senha?</small>
                                        </div>
                                    </div>
                                </div>
                                <input id="EnviarAcompanharInscricao" type="submit" hidden>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-bordo cancelar-formulario" data-dismiss="modal" value="#FormularioAcompanharInscricao" id="BotaoCancelarAcompanhar">Cancelar</button>
                            <label class="btn btn-verde" for="EnviarAcompanharInscricao">Entrar</label>
                        </div>
                    </div>
                </div>
            </div><!--/Modal Acompanhar Inscrição -->

            <!-- Modal Recuperar Senha -->
            <button type="button" class="btn btn-verde" data-toggle="modal" data-target="#RecuperarSenha" id="BotaoRecuperarOculto" hidden></button>
            <div class="modal fade" id="RecuperarSenha" tabindex="-1" role="dialog" aria-labelledby="TituloRecuperarSenha" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="TituloRecuperarSenha">Recuperar senha</h5>
                            <button type="button" class="close cancelar-formulario" data-dismiss="modal" aria-label="Fechar" value="#FormularioRecuperarSenha">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/recuperar-senha.php" method="POST" class="container-fluid" id="FormularioRecuperarSenha">
                                <div class="form-row">
                                    <div class="form-group w-100">
                                        <label for="cpf_login"><b>Informe o seu número de CPF:</b></label>
                                        <input type="text" class="form-control cpf" id="cpf_RecSenha" name="cpf" placeholder="___.___.___-__">
                                    </div>
                                </div>
                                <input id="tipo" name="tipo" type="text" value="PS_USUARIO" hidden>
                                <input id="EnviarRecuperarSenha" type="submit" hidden>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-bordo cancelar-formulario" data-dismiss="modal" value="#FormularioRecuperarSenha" id="BotaoCancelarRecuperar">Cancelar</button>
                            <label class="btn btn-verde" for="EnviarRecuperarSenha">Recuperar Senha</label>
                        </div>
                    </div>
                </div>
            </div><!--/Modal Recuperar Senha -->

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