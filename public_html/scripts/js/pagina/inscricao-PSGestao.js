$(document).ready(function(){
    if($("#inscrito").val()=='1'){
        $("#BotaoPreenchimentoAutomatico").click();
    }

    $("#BotaoFecharPreenAuto").on("click", function(){
        $("#FecharModalPreenAuto").click();
    });

    $("#BotaoCancelarPreenAuto").on("click", function(){
        $("#FecharModalPreenAuto").click();
    });

    function exibir_botao_fechar(){
        $("#BotaoFecharPreenAuto").show();
        $("#BotaoConfirmarPreenAuto").hide();
        $("#BotaoCancelarPreenAuto").hide();
    }

    $("#BotaoConfirmarPreenAuto").on("click", function(){
        $("#MensgPreenAutoInicial").hide();
        $("#MensgPreenAutoCarregando").show();
        if (request) {
            request.abort();
        }
        request = $.ajax({
            url: "/processo-seletivo/gestao/carregar-info-inscrito.php",
            type: "post",
            data: $("#cpf").serializeArray()
        });
        request.done(function(msg){
            console.log(msg);
            const info_voluntario = JSON.parse(msg);
            //preencher dados
            /*$("#INICIO").addClass("d-none");
        $("#DADOS_PESSOAIS").addClass("d-none");
        $("#CARGO_MOTIVACAO").addClass("d-none");
        $("#DISPONIBILIDADE").addClass("d-none");
        $("#DADOS_ADICIONAIS").addClass("d-none");
        $("#REVISAR_ENVIAR").addClass("d-none");*/
            oculta_tudo();
            $("#DADOS_PESSOAIS").removeClass("d-none");
                $("#nome").val(info_voluntario.nome).blur();
                $("#sobrenome").val(info_voluntario.sobrenome).blur();
                $("#sexo").val(info_voluntario.sexo).blur();
                $("#data_nasc").val(info_voluntario.data_nasc).blur();
                if($("#idade").val()<18){
                    $("#nome_resp").val(info_voluntario.nome_resp).blur();
                    $("#cpf_resp").val(info_voluntario.cpf_resp).blur();
                    $("#telefone_resp").val(info_voluntario.telefone_resp).blur();
                    $("#parentesco").val(info_voluntario.parentesco).blur();
                }
                $("#email").val(info_voluntario.email).blur();
                $("#telefone_cand").val(info_voluntario.telefone).blur();
            $("#DADOS_PESSOAIS").addClass("d-none");    
            if(info_voluntario.tipo_info=="G"){
                $("#CARGO_MOTIVACAO").removeClass("d-none");
                    if(info_voluntario.setores.length > 2)
                        $("#setor03").val(info_voluntario.setores[2].ID_SETOR).blur();
                    if(info_voluntario.setores.length > 1)
                        $("#setor02").val(info_voluntario.setores[1].ID_SETOR).blur();
                    if(info_voluntario.setores.length > 0)
                        $("#setor01").val(info_voluntario.setores[0].ID_SETOR).blur();
                    $("#porque_setor").val(info_voluntario.motivo_opcao).blur();
                    $("#porque_entrar").val(info_voluntario.motivacao).blur();
                    $("#como_ajudar").val(info_voluntario.como_contr).blur();
                $("#CARGO_MOTIVACAO").addClass("d-none");
            }
            $("#DISPONIBILIDADE").removeClass("d-none");
                $("#quantas_horas").val(info_voluntario.disp_semanal).blur();
            $("#DISPONIBILIDADE").addClass("d-none");
            $("#DADOS_ADICIONAIS").removeClass("d-none");
                $("#relacao_cursinho").val(info_voluntario.rel_pes).blur();
                $("#ocupacao").val(info_voluntario.ocupacao).blur().change();
                if(info_voluntario.estudante = 1){
                    $("#curso").val(info_voluntario.curso).blur();
                    $("#fase").val(info_voluntario.fase).blur();
                    if(info_voluntario.matricula != 0){
                        $("#matricula").val(info_voluntario.matricula).blur();
                    }
                }
                if(info_voluntario.atv_atual.length > 0){
                    $("#outros_projetos").val("Sim").blur().change();
                    for(var i=0; i<info_voluntario.atv_atual.length; i++){
                        $("#nome_projeto"+i.toString()).val(info_voluntario.atv_atual[i].NOME).blur();
                        $("#carga_horaria_projeto"+i.toString()).val(info_voluntario.atv_atual[i].CARGA_HORARIA).blur();
                        if(i != (info_voluntario.atv_atual.length-1)){
                            $("#ADD_PROJETO").click();
                        }
                    }
                }else{
                    $("#outros_projetos").val("Nao").blur().change();
                }
                if(info_voluntario.atv_antiga.length > 0){
                    $("#outros_projetos_antigo").val("Sim").blur().change();
                    for(var i=0; i<info_voluntario.atv_antiga.length; i++){
                        $("#nome_projeto_antigo"+i.toString()).val(info_voluntario.atv_antiga[i].NOME).blur();
                        $("#prof_projeto_antigo"+i.toString()).val(info_voluntario.atv_antiga[i].NOME_PROF).blur();
                        if(i != (info_voluntario.atv_antiga.length-1)){
                            $("#ADD_PROJETO").click();
                        }
                    }
                }else{
                    $("#outros_projetos_antigo").val("Nao").blur().change();
                }
                if(info_voluntario.exp_voluntario.length > 2){
                    $("#voluntario").val("Sim").change().blur();
                    $("#exp_voluntario").val(info_voluntario.exp_voluntario).blur();
                }else{
                    $("#voluntario").val("Nao").change().blur();
                }
            $("#DADOS_ADICIONAIS").addClass("d-none");

            $("#BotaoInicio").addClass("btn-ativo");
            $("#INICIO").removeClass("d-none");    
            $("#MensgPreenAutoCarregando").hide();
            $("#MensgPreenAutoSucesso").show();
            exibir_botao_fechar();
        });
        request.fail(function(){
            $("#MensgPreenAutoCarregando").hide();
            $("#MensgPreenAutoErro").show();
            exibir_botao_fechar();
        })
    });
    
    $('input').keypress(function (e) {
        var code = null;
        code = (e.keyCode ? e.keyCode : e.which);                
        return (code == 13) ? false : true;
   });
    $("#telefone_cand").change(function(){
        tipo_telefone($(this).val());
    });
    $("#telefone_resp").change(function(){
        tipo_telefone($(this).val());
    });
    $("#EncerrarInscricao").on("click", function(){
        event.preventDefault();
        $("#FormularioGestao").validate().resetForm();
        $("#FormularioGestao").each(function(){
            this.reset();
            $(this).find(".is-valid").removeClass("is-valid");
        })
        $("#FormularioGestao input").val("");
        $("#FormularioGestao select").val("null");
        $("#disponibilidade input").val("Indisponível");
        $(location).attr('href', 'https://pes.ufsc.br/processo-seletivo/gestao');
    });
    $("#BotaoFinalizar").on("click", function(){
        event.preventDefault();
        $("#EncerrarInscricao").click();
    });
    var request;
    function enviar_formulario(){
        if (request) {
            request.abort();
        }
        var $form = $("#FormularioGestao");
        var $inputs = $form.find("input, select, textarea");
        var serializedData = $form.serializeArray();
        $inputs.prop("disabled", true);
        request = $.ajax({
            url: "salvar-inscricao.php",
            type: "post",
            data: serializedData
        });
        request.done(function (response, textStatus, jqXHR){
            console.log(response);
            console.log(textStatus);
            console.log(jqXHR);
            $("#SALVANDO_RESPOSTA").hide();
            $("#EncerrarInscricao").prop("disabled", false);
            if(response.indexOf("ERRO_EMAIL")>=0){
                $("#FINALIZAR_ERRO_EMAIL").show();
            }else if(response.indexOf("SUCESSO")>=0){
                $("#FINALIZAR_SUCESSO").show();
            }else{
                $("#FINALIZAR_ERRO_GRAVE").show();
            }
        });
        request.fail(function (jqXHR, textStatus, errorThrown){
            console.log(errorThrown);
            console.log(textStatus);
            console.log(jqXHR);
            $("#SALVANDO_RESPOSTA").hide();
            $("#FINALIZAR_ERRO_SERVIDOR").show();
            $("#EncerrarInscricao").prop("disabled", false);
        });
        request.always(function () {
            $inputs.prop("disabled", false);
        });
    };

    var count_projetos = 1;
    var count_projetos_antigo = 1;
    $("#data_nasc").blur(function(){
        var aux = $(this).val().replace(/[^\d]+/g,'');
        if(aux.length==8){
            var data = $(this).val().split("/");
            var hoje = new Date();
            var aniversario = new Date(data[2], data[1]-1, data[0]);
            var idade = Math.floor((hoje.getTime()-aniversario.getTime())/31557600000);
            $("#idade").val(idade).change();
            if(idade<18){
                $("#DADOS_RESPONSAVEL_MENOR").show();
            }else{
                $("#DADOS_RESPONSAVEL_MENOR").hide();
            }
        }else{
            $("#idade").val("NaN").change()
        }
    });
    function preencher_revisao(){
        $("#nomeREV").val($("#nome").val()+" "+$("#sobrenome").val());
        $("#cpfREV").val($("#cpf").val());
        $("#dataREV").val($("#data_nasc").val());
        if($("#idade").val()<18){
            $("#INFO_RESPONSAVEL").show();
            $("#TELEFONE_RESP_REV").show();
            $("#nome_respREV").val($("#nome_resp").val());
            $("#cpf_respREV").val($("#cpf_resp").val());
            $("#parentescoREV").val($("#parentesco").val());
            $("#telefone_respREV").val($("#telefone_resp").val());
        }else{
            $("#INFO_RESPONSAVEL").hide();
            $("#TELEFONE_RESP_REV").hide();
        }
        $("#emailREV").val($("#email").val());
        $("#telefoneREV").val($("#telefone_cand").val());
        if($("#ocupacao").val().indexOf("de graduação")>0){
            $("#INFO_ACADEMICAS").show();
            $("#cursoREV").val($("#curso :selected").text());
            $("#faseREV").val($("#fase").val());
            if($("#ocupacao").val().indexOf("UFSC")>0){
                $("#MATRICULA_REV").show();
                $("#matriculaREV").val($("#matricula").val());
            }else{
                $("#MATRICULA_REV").hide();
            }
        }else{
            $("#INFO_ACADEMICAS").hide();
        }
        $("#setor01REV").val($("#setor01 :selected").text());
        if($("#setor02").val()=="null"){
            $("#setor02REV").val("Nenhuma");
        }else{
            $("#setor02REV").val($("#setor02 :selected").text());
        }
        if($("#setor03").val()=="null"){
            $("#setor03REV").val("Nenhuma");
        }else{
            $("#setor03REV").val($("#setor03 :selected").text());
        }
    };
    $("#ConfirmacaoRevisao").on("click", function(){
        if($(this).is(":checked")){
            $("#ErroConfirmacaoRevisao").hide();
        }
    });
    function validar_disponibilidade(){
        var retorno = false;
        $("#disponibilidade input").each(function(){
            if($(this).val()=="Disponível"){
                retorno = true;
            }
        });
        if(retorno){
            $("#ErroDisponibilidade").hide();
        }else{
            $("#ErroDisponibilidade").show();
        }
        return retorno;
    };
    function confirmar_revisao(){
        if($("#ConfirmacaoRevisao").is(":checked")){
            return true;
        }else{
            $("#ErroConfirmacaoRevisao").show();
            return false;
        }
    };
    $("#ConfirmaLeituraEdital").on("click", function(){
        if($(this).is(":checked")){
            $("#ErroConfirmaLeituraEdital").hide();
        }
    });
    function confirmar_leitura_edital(){
        if($("#ConfirmaLeituraEdital").is(":checked")){
            return true;
        }else{
            $("#ErroConfirmaLeituraEdital").show();
            return false;
        }
    }
    $("#PESQUISA_DIVULGACAO").on("click", "input", function(){
        if($(this).is(":checked")){
            $("#ErroPesquisaDivulgacao").hide();
        }
    });
    function validar_pesquisa_divulgacao(){
        var retorno = false;
        $("#PESQUISA_DIVULGACAO input").each(function(){
            if($(this).is(":checked")){
                retorno = true;
            }
        });
        if(retorno){
            $("#ErroPesquisaDivulgacao").hide();
        }else{
            $("#ErroPesquisaDivulgacao").show();
        }
        return retorno;
    };
    function renomear_projetos(){
        var aux = 0;
        $("#INFO_PROJETOS .col-md-6").each(function(){
            $(this).find("input").attr("name", "nome_projeto"+aux);
            $(this).find("input").attr("id", "nome_projeto"+aux);
            $(this).find(".error").attr("id", "nome_projeto"+aux+"-error").attr("for","nome_projeto"+aux);
            aux++;
        });
        aux = 0;
        $("#INFO_PROJETOS .col-md-4").each(function(){
            $(this).find("input").attr("name", "carga_horaria_projeto"+aux);
            $(this).find("input").attr("id", "carga_horaria_projeto"+aux);
            $(this).find(".error").attr("id", "carga_horaria_projeto"+aux+"-error").attr("for","carga_horaria_projeto"+aux);
            aux++;
        });
    };
    function renomear_projetos_antigo(){
        var aux = 0;
        $("#INFO_PROJETOS_ANTIGO .col-md-6").each(function(){
            $(this).find("input").attr("name", "nome_projeto_antigo"+aux);
            $(this).find("input").attr("id", "nome_projeto_antigo"+aux);
            $(this).find(".error").attr("id", "nome_projeto_antigo"+aux+"-error").attr("for","nome_projeto_antigo"+aux);
            aux++;
        });
        aux = 0;
        $("#INFO_PROJETOS_ANTIGO .col-md-4").each(function(){
            $(this).find("input").attr("name", "prof_projeto_antigo"+aux);
            $(this).find("input").attr("id", "prof_projeto_antigo"+aux);
            $(this).find(".error").attr("id", "prof_projeto_antigo"+aux+"-error").attr("for","prof_projeto_antigo"+aux);
            aux++;
        });
    };
    $("#voluntario").change(function(){
        if($(this).val()=="Sim"){
            $("#TRABALHO_VOLUNTARIO").show();
        }else{
            $("#TRABALHO_VOLUNTARIO").hide();
            $("#TRABALHO_VOLUNTARIO textarea").val("").removeClass("is-valid").removeClass("is-invalid");
            $("#TRABALHO_VOLUNTARIO").find(".error").remove();
        }
    });
    $("#ADD_PROJETO_ANTIGO").on("click", function(){
        event.preventDefault();
        
        if(count_projetos_antigo < 5){
            count_projetos_antigo++;
            $("#INFO_PROJETOS_ANTIGO").append('<div class="form-row LinhaExtra"><div class="form-group col-md-6"><input type="text" class="form-control" name="nome_projeto_antigo[]" placeholder="Digite o nome do projeto/atividade"></div><div class="form-group col-md-4"><input type="text" class="form-control" name="prof_projeto_antigo[]" placeholder="Digite o nome do professor responsável"></div><div class="form-group ml-1"><button class="btn btn-bordo BotaoRemoverProjeto">Remover</button></div></div>');
            renomear_projetos_antigo()
        }else{
            $("#ErroADDProjetosAntigo").show();
        }
    });
    $("#INFO_PROJETOS_ANTIGO").on("click", ".BotaoRemoverProjeto", function(){
        event.preventDefault();
        count_projetos_antigo--;
        $("#ErroADDProjetosAntigo").hide();
        $(this).closest(".form-row").remove();
        renomear_projetos_antigo();
    });
    $("#outros_projetos_antigo").change(function(){
        if($(this).val()=="Sim"){
            $("#OUTROS_PROJETOS_ANTIGO").show();
        }else{
            count_projetos_antigo = 1;
            $("#OUTROS_PROJETOS_ANTIGO").hide();
            $("#ErroADDProjetosAntigo").hide();
            $("#INFO_PROJETOS_ANTIGO .LinhaExtra").each(function(){
                $(this).remove();
            });
            $("#OUTROS_PROJETOS_ANTIGO input").each(function(){
                $(this).val("").removeClass("is-valid").removeClass("is-invalid");
            });
            $("#OUTROS_PROJETOS_ANTIGO").find(".error").each(function(){
                $(this).remove();
            });
        }
    });
    $("#ADD_PROJETO").on("click", function(){
        event.preventDefault();
        if(count_projetos < 5){
            count_projetos++;
            $("#INFO_PROJETOS").append('<div class="form-row LinhaExtra"><div class="form-group col-md-6"><input type="text" class="form-control" placeholder="Digite o nome do projeto/atividade"></div><div class="form-group col-md-4"><input type="text" class="form-control" placeholder="Digite a carga horária"></div><div class="form-group ml-1"><button class="btn btn-bordo BotaoRemoverProjeto">Remover</button></div></div>');
            renomear_projetos();
        }else{
            $("#ErroADDProjetos").show();
        }
    });
    $("#INFO_PROJETOS").on("click", ".BotaoRemoverProjeto", function(){
        event.preventDefault();
        count_projetos--;
        $("#ErroADDProjetos").hide();
        $(this).closest(".form-row").remove();
        renomear_projetos();
    });
    $("#outros_projetos").change(function(){
        if($(this).val()=="Sim"){
            $("#OUTROS_PROJETOS").show();
        }else{
            count_projetos = 1;
            $("#OUTROS_PROJETOS").hide();
            $("#ErroADDProjetos").hide();
            $("#INFO_PROJETOS .LinhaExtra").each(function(){
                $(this).remove();
            });
            $("#OUTROS_PROJETOS input").each(function(){
                $(this).val("").removeClass("is-valid").removeClass("is-invalid");
            });
            $("#OUTROS_PROJETOS").find(".error").each(function(){
                $(this).remove();
            });
        }
    });
    $("#ocupacao").change(function(){
        if($(this).val().indexOf("de graduação")>0){
            $("#ALUNO_GRADUACAO").show();
            if($(this).val().indexOf("UFSC")>0){
                $("#MATRICULA").show();
            }else{
                $("#MATRICULA").hide();
                $("#MATRICULA input").val("").removeClass("is-valid").removeClass("is-invalid");
                $("#MATRICULA").find(".error").remove();
            }
        }else{
            $("#ALUNO_GRADUACAO").hide();
            $("#ALUNO_GRADUACAO .ocultar").hide();
            $("#ALUNO_GRADUACAO input").each(function(){
                $(this).val("").removeClass("is-valid").removeClass("is-invalid");
            })
            $("#ALUNO_GRADUACAO label").each(function(){
                if($(this).hasClass("error")){
                    $(this).remove();
                }
            })
            $("#ALUNO_GRADUACAO select").val("null").removeClass("is-valid").removeClass("is-invalid");
        }
    });
    $("#disponibilidade").on("click", ".btn", function(){
        if($(this).val()=="Disponível"){
            $(this).addClass("btn-danger").removeClass("btn-success");
            $(this).val("Indisponível");
        }else{
            $("#ErroDisponibilidade").hide();
            $(this).addClass("btn-success").removeClass("btn-danger");
            $(this).val("Disponível")
        }
    });
    $("#idade").change( function(){
        $("#FormularioGestao").validate().element("#idade");
    });
    function oculta_tudo(){
        $("#INICIO").addClass("d-none");
        $("#DADOS_PESSOAIS").addClass("d-none");
        $("#CARGO_MOTIVACAO").addClass("d-none");
        $("#DISPONIBILIDADE").addClass("d-none");
        $("#DADOS_ADICIONAIS").addClass("d-none");
        $("#REVISAR_ENVIAR").addClass("d-none");
        remove_sel_botao();
    }
    function remove_sel_botao(){
        $("#BotaoInicio").removeClass("btn-ativo");
        $("#BotaoDadosPessoais").removeClass("btn-ativo");
        $("#BotaoCargoMotivacao").removeClass("btn-ativo");
        $("#BotaoDisponibilidade").removeClass("btn-ativo");
        $("#BotaoDadosAdicionais").removeClass("btn-ativo");
        $("#BotaoRevisarEnviar").removeClass("btn-ativo");
    }
    function validacao(limite){
        oculta_tudo();
        var validator = $("#FormularioGestao").validate();
        $("#INICIO").removeClass("d-none");
        if(limite=="BotaoInicio"){
            $("#BotaoInicio").addClass("btn-ativo");
            return;
        }
        if(confirmar_leitura_edital()){
            $("#INICIO").addClass("d-none");
            $("#DADOS_PESSOAIS").removeClass("d-none");
            if(limite=="BotaoDadosPessoais"){
                $("#BotaoDadosPessoais").addClass("btn-ativo");
                validator.element("#cpf");
                return;
            }
            if(validator.form()){
                $("#DADOS_PESSOAIS").addClass("d-none");
                $("#CARGO_MOTIVACAO").removeClass("d-none");
                if(limite=="BotaoCargoMotivacao"){
                    $("#BotaoCargoMotivacao").addClass("btn-ativo");
                    return;
                }
                if(validator.form()){
                    $("#CARGO_MOTIVACAO").addClass("d-none");
                    $("#DISPONIBILIDADE").removeClass("d-none");
                    if(limite=="BotaoDisponibilidade"){
                        $("#BotaoDisponibilidade").addClass("btn-ativo");
                        return;
                    }
                    var aux1 = validator.form();
                    var aux2 = validar_disponibilidade();
                    if(aux1 && aux2){
                        $("#DISPONIBILIDADE").addClass("d-none");
                        $("#DADOS_ADICIONAIS").removeClass("d-none");
                        if(limite=="BotaoDadosAdicionais"){
                            $("#BotaoDadosAdicionais").addClass("btn-ativo");
                            return;
                        }
                        var aux3 = validar_pesquisa_divulgacao();
                        var aux4 = validator.form();
                        if(aux3 && aux4){
                            $("#DADOS_ADICIONAIS").addClass("d-none");
                            $("#REVISAR_ENVIAR").removeClass("d-none");
                            $("#BotaoRevisarEnviar").addClass("btn-ativo");
                            preencher_revisao();
                        }else{
                            $("#BotaoDadosAdicionais").addClass("btn-ativo");
                            $("#BotaoMensagemErro").click();
                        }
                    }else{
                        $("#BotaoDisponibilidade").addClass("btn-ativo");
                        $("#BotaoMensagemErro").click();
                    }
                }else{
                    $("#BotaoCargoMotivacao").addClass("btn-ativo");
                    $("#BotaoMensagemErro").click();
                }
            }else{
                $("#BotaoDadosPessoais").addClass("btn-ativo");
                validator.element("#cpf");
                validator.element("#email");
                $("#BotaoMensagemErro").click();
            }
        }else{
            $("#BotaoInicio").addClass("btn-ativo");
            $("#BotaoMensagemErro").click();
        }
    }
    $("#BotaoInicio").on("click", function(){
        validacao(this.id);
    });
    $("#BotaoDadosPessoais").on("click", function(){
        validacao(this.id);
    });
    $("#BotaoCargoMotivacao").on("click", function(){
        validacao(this.id);
    });
    $("#BotaoDisponibilidade").on("click", function(){
        validacao(this.id);
    });
    $("#BotaoDadosAdicionais").on("click", function(){
        validacao(this.id);
    });
    $("#BotaoRevisarEnviar").on("click", function(){
        validacao(this.id);
    });
    $("#Proximo00").on("click", function(){
        event.preventDefault();
        $("#BotaoDadosPessoais").click();
    });
    $("#Proximo01").on("click", function(){
        event.preventDefault();
        $("#BotaoCargoMotivacao").click();
    });
    $("#Proximo02").on("click", function(){
        event.preventDefault();
        $("#BotaoDisponibilidade").click();
    });
    $("#Proximo03").on("click", function(){
        event.preventDefault();
        $("#BotaoDadosAdicionais").click();
    });
    $("#Proximo04").on("click", function(){
        event.preventDefault();
        $("#BotaoRevisarEnviar").click();
    });
    $("#Proximo05").on("click", function(){
        event.preventDefault();
        if(confirmar_revisao()){
            oculta_tudo();
            $("#BotaoFinalizar").show();
            $("#FINALIZAR").removeClass("d-none");
            $("#BotoesBarraLateral .btn").each(function(){
                if(!$(this).hasClass("ocultar")){
                    $(this).prop("disabled", true);
                }
            });
            enviar_formulario();
        }else{
            $("#BotaoMensagemErro").click();
        }
    });
    $("#Anterior00").on("click", function(){
        event.preventDefault();
        $("#FormularioGestao").validate().resetForm();
        $("#FormularioGestao").each(function(){
            this.reset();
            $(this).find(".is-valid").removeClass("is-valid");
        })
        $("#FormularioGestao input").val("");
        $("#FormularioGestao select").val("null");
        $("#disponibilidade input").val("Indisponível");
        $(location).attr('href', 'https://pes.ufsc.br/processo-seletivo/gestao');
    });
    $("#Anterior01").on("click", function(){
        event.preventDefault();
        $("#DADOS_PESSOAIS").addClass("d-none");
        $("#BotaoDadosPessoais").removeClass("btn-ativo");
        $("#INICIO").removeClass("d-none");
        $("#BotaoInicio").addClass("btn-ativo");
    });
    $("#Anterior02").on("click", function(){
        event.preventDefault();
        $("#CARGO_MOTIVACAO").addClass("d-none");
        $("#BotaoCargoMotivacao").removeClass("btn-ativo");
        $("#DADOS_PESSOAIS").removeClass("d-none");
        $("#BotaoDadosPessoais").addClass("btn-ativo");
    });
    $("#Anterior03").on("click", function(){
        event.preventDefault();
        $("#DISPONIBILIDADE").addClass("d-none");
        $("#BotaoDisponibilidade").removeClass("btn-ativo");
        $("#CARGO_MOTIVACAO").removeClass("d-none");
        $("#BotaoCargoMotivacao").addClass("btn-ativo");
    });
    $("#Anterior04").on("click", function(){
        event.preventDefault();
        $("#DADOS_ADICIONAIS").addClass("d-none");
        $("#BotaoDadosAdicionais").removeClass("btn-ativo");
        $("#DISPONIBILIDADE").removeClass("d-none");
        $("#BotaoDisponibilidade").addClass("btn-ativo");
    });
    $("#Anterior05").on("click", function(){
        event.preventDefault();
        $("#REVISAR_ENVIAR").addClass("d-none");
        $("#BotaoRevisarEnviar").removeClass("btn-ativo");
        $("#DADOS_ADICIONAIS").removeClass("d-none");
        $("#BotaoDadosAdicionais").addClass("btn-ativo");
    });
})