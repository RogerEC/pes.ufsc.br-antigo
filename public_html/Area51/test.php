<?php 
    $cpf="000.000.000-00";
    $email="email.exemplo@pes.ufsc.br"
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <?php $path = $_SERVER['DOCUMENT_ROOT']; require_once($path."/scripts/php/componentes/links-head.php"); //Links padrões do head?>
        <title>Título Aqui</title>
    </head>
    <style type="text/css">
        ::-webkit-scrollbar {
            width: 0px;
        }
    </style>

    <body>

        <main class="pt-0 w-100 h-100" id="FormularioInscricao"><!--Conteúdo da página-->

            <div class="coluna-barra-lateral d-none d-sm-block bg-bordo-pes">
                <div class="container-fluid bg-bordo-pes">
                    <img class="pt-3 pb-3" src="/img/logo-circular.png" width="100%">
                    <button class="btn btn-info w-100 " id="BotaoInicio">Início</button>
                    <button class="btn btn-info w-100 mt-2">Dados gerais</button>
                    <button class="btn btn-info w-100 mt-2">Dados escolares</button>
                    <button class="btn btn-info w-100 mt-2">Dados adicionais</button>
                    <button class="btn btn-info w-100 mt-2 mb-3">Revisar e enviar</button>
                </div>
            </div>
            <div class="coluna-formulario">
                <div class="container-fluid">
                    <form action="formulario.php" method="POST">
                        <div id="DADOS_PESSOAIS" class="teste">
                            <div class="titulo">Dados pessoais e de contato</div>
                            <div class="conteudo">
                            <div class="form-row">
                                <div class="form-group col-sm">
                                    <label for="nome"><b>Nome:</b></label>
                                    <input type="text" class="form-control" id="nome" placeholder="Nome">
                                </div>
                                <div class="form-group col-sm">
                                    <label for="sobrenome"><b>Sobrenome:</b></label>
                                    <input type="text" class="form-control" id="sobrenome" placeholder="Sobrenome">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="sexo"><b>Sexo:</b></label>
                                    <select class="form-control" id="sexo">
                                        <option value="" selected>Selecione...</option>
                                        <option value="F">Feminino</option>
                                        <option value="M">Masculino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="rg"><b>Nº RG:</b></label>
                                    <input type="text" class="form-control" id="rg">
                                </div>
                                <div class="form-row col-md-9">
                                    <div class="form-group col-8">
                                        <label for="emissor"><b>Órgão Emissor:</b></label>
                                        <select class="form-control" id="emissor">
                                            <option value="" selected>Selecione...</option>
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
                                            <option value="SSP">SSP - Secretaria de Segurança Pública</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="uf_emissao"><b>UF de emissão:</b></label>
                                        <select class="form-control" id="uf-emissao">
                                            <option value="" selected>Selecione...</option>
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
                                    <input type="text" class="form-control cpf" id="cpf" value=<?php echo "\"$cpf\""; ?> readonly>
                                </div>
                                <div class="form-row col-md-5">
                                    <div class="form-group col-6">
                                        <label for="data_nasc"><b>Data de Nascimento:</b></label>
                                        <input type="text" class="form-control" id="data_nasc" placeholder="dd/mm/aaaa">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="linha_idade"><b>Idade:</b></label>
                                        <div class="form-group row" id="linha_idade">
                                            <div class="col-6">
                                                <input type="text" class="form-control" id="idade" readonly>
                                            </div>
                                            <label for="idade" class="col-form-label">Anos</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="e_mail"><b>E-mail:</b></label>
                                    <input type="email" class="form-control" id="e_email" value=<?php echo "\"$email\""; ?> readonly>
                                </div>
                                <div class="form-row col-md-4">
                                    <div class="form-group col-3">
                                        <label for="ddd_aluno"><b>DDD:</b></label>
                                        <input type="text" class="form-control" id="ddd_aluno">
                                    </div>
                                    <div class="form-group col-9">
                                        <label for="telefone_aluno"><b>Telefone (WhatsApp):</b></label>
                                        <input type="text" class="form-control" id="telefone_aluno">
                                    </div>
                                </div>
                            </div>
                            <div id="DADOS_RESPONSAVEL_MENOR" style="display: none;">
                                <div class="subtitulo">Dados do responsável legal (obrigatório para menores de 18 anos)</div>
                                <div class="form-row">
                                    <div class="form-group col-md-9">
                                        <label for="nome_resp"><b>Nome completo:</b></label>
                                        <input type="text" class="form-control" id="nome_resp">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="parentesco"><b>Grau de parentesco:</b></label>
                                        <select id="parentesco" class="form-control">
                                            <option value="" selected>Selecione...</option>
                                            <option value="">Pai ou mãe</option>
                                            <option value="">Avô ou avó</option>
                                            <option value="">Tio ou tia</option>
                                            <option value="">Irmão ou irmã</option>
                                            <option value="">Outro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="cpf_resp"><b>CPF:</b></label>
                                        <input type="text" class="form-control cpf" id="cpf_resp" placeholder="___.___.___-__">
                                    </div>
                                    <div class="form-row col-md-4">
                                        <div class="form-group col-3">
                                            <label for="ddd_aluno"><b>DDD:</b></label>
                                            <input type="text" class="form-control" id="ddd_resp">
                                        </div>
                                        <div class="form-group col-9">
                                            <label for="telefone_aluno"><b>Telefone:</b></label>
                                            <input type="text" class="form-control" id="telefone_resp">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="rodape mr-auto">
                                <button class="btn btn-info">Próximo</button>
                            </div>
                        </div>
                        <div id="DADOS_ENDERECO" class="ocultar">
                            <div class="titulo">Dados de endereço</div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="cep"><b>CEP:</b></label>
                                    <input type="text" class="form-control" id="cep">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="endereco"><b>Endereço:</b></label>
                                    <input type="text" class="form-control" id="endereco"  readonly>
                                </div>
                                <div class="form-row col-md-7">
                                    <div class="form-group col-3">
                                        <label for="numero"><b>Número:</b></label>
                                        <input type="text" class="form-control" id="numero">
                                    </div>
                                    <div class="form-group col-9">
                                        <label for="complemento"><b>Complemento:</b></label>
                                        <input type="text" class="form-control" id="complemento">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="bairro"><b>Bairro:</b></label>
                                    <input type="text" class="form-control" id="bairro" readonly>
                                </div>
                                <div class="form-row col-md-7">
                                    <div class="form-group col-9">
                                        <label for="cidade"><b>Cidade:</b></label>
                                        <input type="text" class="form-control" id="cidade" readonly>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="uf_endereco"><b>Estado:</b></label>
                                        <input type="text" class="form-control" id="uf_endereco" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </main><!--/Conteúdo da página-->
        
        <!--Javascript-->
        <script src="/scripts/js/libs/jquery-3.4.1.min.js"></script>
        <script src="/scripts/js/libs/bootstrap.min.js"></script>
    </body>
</html>