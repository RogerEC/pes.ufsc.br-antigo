<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];

    if(!empty($_POST["cpf"]) && isset($_POST["cpf"])){
        $cpf = $_POST["cpf"];
    }else{
       // $erro=401;
       // include $path."/erro.php";
       // exit;
       $cpf="";
    }
    if(!empty($_POST["email"]) && isset($_POST["email"])){
        $email = $_POST["email"];
    }else{
        $email = "";
    }
    if(!empty($_POST["senha"]) && isset($_POST["senha"])){
        $senha = $_POST["senha"];
    }else{
        $senha = "";
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Formulário de Inscrição - Alunos</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="robots" content="none">
        <?php $path = $_SERVER['DOCUMENT_ROOT']; require_once($path."/scripts/php/componentes/links-head.php"); //Links padrões do head?>
    </head>

    <body>
        
        <?php require_once($path."/scripts/php/componentes/barra-navegacao.php"); //Barra de Navegação?>

        <main class="container"><!--Conteúdo da página-->

            <form action="formulario.php" method="POST">
                <div class="titulo">Dados pessoais e de contato</div>
                <div id="DADOS_PESSOAIS">
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
                <div id="DADOS_ENDERECO">
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

                <div class="titulo">Disponibilidade de horário</div>
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
                </div>
                
                <div id="INFORMACOES_ADICIONAIS">
                    <div class="titulo">Informações Adicionais</div>
                    <div class="subtitulo">Ocupação</div>
                    <div class="form-row">
                        <div class="form-group col-auto pt-1-5">
                            Qual a sua principal ocupação?
                        </div>
                        <div class="form-group col-3">
                            <select class="form-control" id="origem">
                                <option value="" selected>Selecione...</option>
                                <option value="">Estudante de graduação na UFSC</option>
                                <option value="">Estudante de graduação em outra universidade</option>
                                <option value="">Estudante de pós-graduação</option>
                                <option value="">Servidor público ou técnico na UFSC</option>
                                <option value="">Servidor público em outra instituição</option>
                                <option value="">Empregado em empresa privada</option>
                                <option value="">Professor da rede municipal/estadual</option>
                                <option value="">Outro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-auto pt-1-5">
                            Qual curso você está cursando na UFSC?
                        </div>
                        <div class="form-group col-3">
                            <select class="form-control" id="test">
                                <option value="" selected>Selecione...</option>
                                <option value="">Outro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-auto pt-1-5">
                            Você participa de algum outro projeto de extensão, pesquisa ou monitoria na UFSC?
                        </div>
                        <div class="form-group col-3">
                            <select class="form-control" id="test">
                                <option value="" selected>Selecione...</option>
                                <option value="">Sim</option>
                                <option value="">Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-9">
                            <label><b>Nome do projeto:</b></label>
                            <input type="text" class="form-control" placeholder="Se respondeu sim na anterior, vai poder adicionar quantos quiser (até uns 5 no máximo)">
                        </div>
                        <div class="form-group col-3">
                            <label for="test_1"><b>Carga horária:</b></label>
                            <select class="form-control" id="test_1">
                                <option value="" selected>Selecione...</option>
                                <option value="">Menos de 4 horas/semana</option>
                                <option value="">De 4 a 8 horas/semana</option>
                                <option value="">De 9 a 12 horas/semana</option>
                                <option value="">De 13 a 16 horas/semana</option>
                                <option value="">De 17 a 20 horas/semana</option>
                                <option value="">Mais de 20 horas/semana</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-auto pt-1-5">
                            Qual disciplina?
                        </div>
                        <div class="form-group col-4">
                            <select class="form-control" id="origem">
                                <option value="" selected>Vai poder escolher vários...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-auto pt-1-5">
                            Porque você quer entrar para o cursinho?
                        </div>
                        <div class="form-group col-3">
                            <select class="form-control" id="test">
                                <option value="" selected>Vai ser texto...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-auto pt-1-5">
                            Como você acredita que pode ajudar dentro do cursinho?
                        </div>
                        <div class="form-group col-3">
                            <select class="form-control" id="test">
                                <option value="" selected>Vai ser texto...</option>
                            </select>
                        </div>
                    </div>
                    <div class="subtitulo">Como você nos conheceu</div>
                    <div class="form-row">
                        <div class="form-group col-auto pt-1-5">
                            Como você tomou conhecimento do Cursinho PES?
                        </div>
                        <div class="form-group col-4">
                            <select class="form-control" id="test">
                                <option value="" selected>Seleciona vários dessa lista...</option>
                                <option value="">Instagram</option>
                                <option value="">Faceboook</option>
                                <option value="">Indicação de amigos e/ou familiares</option>
                                <option value="">Festa Junina</option>
                                <option value="">Passaram na minha sala</option>
                                <option value="">Cartaz no mural da UFSC</option>
                                <option value="">PES Convida</option>
                                <option value="">Algum evento da UFSC</option>
                                <option value="">Outro</option>
                            </select>
                        </div>
                    </div>
                </div>
                
            </form>

        </main><!--/Conteúdo da página-->

        <?php require_once($path."/scripts/php/componentes/rodape.php"); //Rodapé?>
        
        <!--Javascript-->
        <script>
            var str_cidades, str_uf, cidades, estados;

            str_cidades = "<?php echo $cidadesphp;?>";
            str_uf = "<?php echo $ufphp;?>";

            cidades = str_cidades.split("|");
            estados = str_uf.split("|");
        </script>
        <script src="/scripts/js/libs/jquery-3.4.1.min.js"></script>
        <script src="/scripts/js/libs/bootstrap.min.js"></script>
        <script src="/scripts/js/libs/api_viacep.js"></script>
        <script src="/scripts/js/libs/jquery.maskedinput.js"></script>
        <script src="/scripts/js/definicoes-maskedinput.js"></script>
        <script src="/scripts/js/inscricao-PS.js"></script>
    </body>
</html>