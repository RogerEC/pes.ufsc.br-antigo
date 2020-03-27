<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Processo Seletivo de Professores - Cursinho PES</title>
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
                    <h1>Processo Seletivo de Professores 2020</h1>
                </div>
                <div class="text-center w-100 pb-5">
                    <button type="button" class="btn btn-verde mt-2" id="BotaoInscrever">
                        Realizar Inscrição
                    </button>
                    <button type="button" class="btn btn-verde mt-2" id="BotaoAcompanhar" disabled hidden>
                        Acompanhar Inscrição
                    </button>
                </div>
                <p><h5>Documentos importantes:</h5></p>
                <p>[16/03/2020] <a href="/processo-seletivo/professores/2020/Suspensao_Edital_N02PES2020.pdf" target="_blank">Suspensão do Cronograma de Atividades para o Edital Nº 02/PES/2020</a></p>
                <p>[13/03/2020] <a href="/processo-seletivo/professores/2020/Edital_N02PES2020-2.pdf" target="_blank">Prorrogação do prazo de inscrição para o Edital Nº 02/PES/2020</a></p>
                <p>[07/03/2020] <a href="/processo-seletivo/professores/2020/Edital_N02PES2020.pdf" target="_blank">Edital Nº 02/PES/2020 - Processo Seletivo de Professores 2020</a></p>
                <p>[07/03/2020] <a href="/processo-seletivo/professores/2020/Edital_N02PES2020-Anexo_I.pdf" target="_blank">Anexo I - Atribuições dos professores</a></p>
                <p>[07/03/2020] <a href="/processo-seletivo/professores/2020/Calendario2020-Professores.pdf" target="_blank">Anexo II - Calendário Letivo Cursinho PES 2020</a></p>
            </div>
        
            <!-- Modal Realizar inscrição -->
            <button type="button" class="btn btn-verde" data-toggle="modal" data-target="#RealizarInscricao" id="BotaoInscreverOculto" hidden></button>
            <div class="modal fade" id="RealizarInscricao" tabindex="-1" role="dialog" aria-labelledby="TituloRealizarInscricao" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-bordo-pes">
                            <h5 class="modal-title" id="TituloRealizarInscricao">Inscrição no Processo Seletivo</h5>
                            <button type="button" class="close cancelar-formulario white-color" style="color: white" data-dismiss="modal" aria-label="Fechar" value="#FormularioRealizarInscricao">
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
                            </form>
                        </div>
                        <div class="modal-footer bg-bordo-pes">
                            <button type="button" class="btn btn-bordo cancelar-formulario" data-dismiss="modal" id="BotaoCancelarInscrever" value="#FormularioRealizarInscricao">Cancelar</button>
                            <button class="btn btn-verde" id="EnviarRealizarInscricao" value="professores">Enviar Inscrição</button>
                        </div>
                    </div>
                </div>
            </div><!--/Modal Realizar inscrição -->

            <!-- Modal Acompanhar Inscrição -->
            <button type="button" class="btn btn-verde" data-toggle="modal" data-target="#AcompanharInscricao" id="BotaoAcompanharOculto" hidden></button>
            <div class="modal fade" id="AcompanharInscricao" tabindex="-1" role="dialog" aria-labelledby="TituloAcompanharInscricao" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
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
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-bordo cancelar-formulario" data-dismiss="modal" value="#FormularioAcompanharInscricao" id="BotaoCancelarAcompanhar">Cancelar</button>
                            <button class="btn btn-verde" id="EnviarAcompanharInscricao" value="professor">Entrar</button>
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
                            <button type="button" class="close cancelar-formulario white-color" data-dismiss="modal" aria-label="Fechar" value="#FormularioRecuperarSenha">
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
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-bordo cancelar-formulario" data-dismiss="modal" value="#FormularioRecuperarSenha" id="BotaoCancelarRecuperar">Cancelar</button>
                            <button class="btn btn-verde" id="EnviarRecuperarSenha">Recuperar Senha</button>
                        </div>
                    </div>
                </div>
            </div><!--/Modal Recuperar Senha -->
            
            <!-- Modal Data de inscrição encerrada -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MensagemErroData" id="BotaoMensagemErroDataData" hidden></button>
            <div class="modal fade" id="MensagemErroData" tabindex="-1" role="dialog" aria-labelledby="TituloMensagemErroData" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-erro-form">
                            <h5 class="modal-title text-center w-100" id="TituloMensagemErroData">ATENÇÃO!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <p class="mb-1">Você não pode mais se inscrever nesse processo seletivo.</p>
                                <p>As datas de inscrição já foram encerradas .</p>
                            </div>
                        </div>
                        <div class="modal-footer bg-bordo-pes">
                            <button type="button" class="btn btn-verde btn-ativo" data-dismiss="modal">Entendi</button>
                        </div>
                    </div>
                </div>
            </div><!--/Modal Data de inscrição encerrada -->
        </main><!--/Conteúdo da página-->

        <?php require_once($path."/scripts/php/componentes/rodape.php"); //Rodapé?>
        
        <!--Javascript-->
        <script src="/scripts/js/libs/jquery-3.4.1.min.js"></script>
        <script src="/scripts/js/libs/bootstrap.min.js"></script>
        <script src="/scripts/js/libs/jquery.maskedinput.js"></script>
        <script src="/scripts/js/definicoes-maskedinput.js"></script>
        <script src="/scripts/js/libs/jquery.validate.min.js"></script>
        <script src="/scripts/js/validacao-PS.js"></script>
        <script src="/scripts/js/pagina/inicio-PSs.js"></script>
    </body>
</html>