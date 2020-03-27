<?php
    header('Set-Cookie: cross-site-cookie=bar; SameSite=None; Secure');

    function transpose($array) {
        array_unshift($array, null);
        return call_user_func_array('array_map', $array);
    }

    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path."/scripts/php/banco/conexao.php");

    $resultado = mysqli_query($conexao, "SELECT * FROM PS_ESCOLA");

    $dados = mysqli_fetch_all($resultado);

    $transposta = transpose($dados);

    $cidadesphp = implode("|", $transposta[2]);
    $ufphp = implode("|", $transposta[3]);
?>
<!doctype html>
<html>
    <head>
        <?php $path = $_SERVER['DOCUMENT_ROOT']; require_once($path."/scripts/php/componentes/links-head.php"); //Links padrões do head?>
    </head>

    <body>

    <?php require_once($path."/scripts/php/componentes/barra-navegacao.php"); //Barra de Navegação?>

        <main class="container-fluid">
            <form action="formulario.php" method="POST">
                <h1><b>Informações pessoais e de contato</b></h1>
                <br>
                <div id="DADOS_PESSOAIS">
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="nome"><b>Nome:</b></label>
                            <input type="text" class="form-control" id="nome" placeholder="Nome" required>
                        </div>
                        <div class="form-group col-md">
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
                            <label for="rg"><b>RG:</b></label>
                            <input type="text" class="form-control" id="rg">
                        </div>
                        <div class="form-group col-md-6">
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
                        <div class="form-group col-md-3">
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
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="cpf"><b>CPF:</b></label>
                            <input type="text" class="form-control" id="cpf">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="data_nasc"><b>Data de Nascimento:</b></label>
                            <input type="date" class="form-control" id="data_nasc" placeholder="dd/mm/aaaa">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="e_mail"><b>E-mail:</b></label>
                            <input type="email" class="form-control" id="e_email" placeholder="exemplo@email.com">
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
                </div>
                <br>
                <br>
                <br>
                <h1><b>Informações de endereço</b></h1>
                <br>
                <div id="DADOS_ENDERECO">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="cep"><b>CEP:</b></label>
                            <input type="text" class="form-control" id="cep" onblur="pesquisacep(this.value);">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="endereco"><b>Endereço:</b></label>
                            <input type="text" class="form-control" id="endereco" readonly>
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
                <br>
                <br>
                <br>
                <h1><b>Informações de contato do responsável</b></h1>
                <br>
                <div id="DADOS_RESPONSAVEL">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="nome_resp"><b>Nome do pai/mãe/responsável:</b></label>
                            <input type="text" class="form-control" id="nome_resp">
                        </div>
                        <div class="form-row col-md-4">
                            <div class="form-group col-3">
                                <label for="ddd_aluno"><b>DDD:</b></label>
                                <input type="text" class="form-control" id="ddd_pai">
                            </div>
                            <div class="form-group col-9">
                                <label for="telefone_aluno"><b>Telefone:</b></label>
                                <input type="text" class="form-control" id="telefone_pai">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <h1><b>Informações Escolares</b></h1>
                <br>
                <div id="DADOS_ESCOLARES">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <input class="form-check-input" type="radio" name="tipo_aluno" id="tipo_aluno1" valor="Aluno" onclick="exibir_dados_estudante()" checked>
                            <label class="form-check-label" for="tipo_aluno1">Estudante</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-check-input" type="radio" name="tipo_aluno" id="tipo_aluno2" valor="Formado" onclick="exibir_dados_formado()">
                            <label class="form-check-label" for="tipo_aluno2">Não Estudante</label>
                        </div>
                    </div>
                    <div id="DADOS_ESTUDANTE">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="nome_escola"><b>Nome da escola:</b></label>
                                <select class="form-control" id="nome_escola" onblur="outra_escola(this.value)">
                                    <option value="" selected>Selecione...</option>
                                <?php foreach ($transposta[1] as $key => $value): ?>
                                    <?php $key++; ?>
                                    <?php echo "<option value=\"$key\" >$value</option>\n";?>
                                <?php endforeach; ?>
                                    <option value="outra">Outra (informe qual)</option>
                                </select>
                            </div>
                            <div class="form-row col-md-7">
                                <div class="form-group col-9">
                                    <label for="cidade"><b>Cidade:</b></label>
                                    <input type="text" class="form-control" id="cidade_escola" readonly>
                                </div>
                                <div class="form-group col-3">
                                    <label for="uf_endereco"><b>Estado:</b></label>
                                    <input type="text" class="form-control" id="uf_escola" readonly>
                                </div>
                            </div>
                        </div>
                        <div id="NOVA_ESCOLA" style="display: none;">
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <input type="text" class="form-control" id="nome_nova_escola" placeholder="Nome da Escola">
                                </div>
                                <div class="form-row col-md-7">
                                    <div class="form-group col-6">
                                        <input type="text" class="form-control" id="cidade_nova_escola" placeholder="Cidade">
                                    </div>
                                    <div class="form-group col-3">
                                        <input type="text" class="form-control" id="uf_nova_escola" placeholder="Estado">
                                    </div>
                                    <div class="col-auto">
                                        <div class="btn btn-primary" onclick="adicionar_escola()" id="adc_esc">Adicionar</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="DADOS_FORMADO" style="display: none;">
                        <p>NÃO É ALUNO</p>
                        <p>NÃO É ALUNO</p>
                        <br>
                        <br>
                    </div>
                </div>
                
            
    
            </form>
        </main>

        <?php require_once($path."/scripts/php/componentes/rodape.php"); //Rodapé?>

        <script>
            var str_cidades, str_uf, cidades, estados;

            str_cidades = "<?php echo $cidadesphp;?>";
            str_uf = "<?php echo $ufphp;?>";

            cidades = str_cidades.split("|");
            estados = str_uf.split("|");
        </script>
        
        <script src="/scripts/js/jquery-3.4.1.min.js"></script>
        <script src="/scripts/js/bootstrap.min.js"></script>
        <script src="/scripts/js/api_viacep.js"></script>
        <script src="/scripts/js/jquery.maskedinput.js"></script>
        <script src="/scripts/js/definicoes-maskedinput.js"></script>
        <script src="/scripts/js/formularioAlunos.js"></script>
    </body>
</html>