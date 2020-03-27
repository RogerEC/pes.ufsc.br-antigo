$(document).ready(function(){
    $('input').keypress(function (e) {
        var code = null;
        code = (e.keyCode ? e.keyCode : e.which);                
        return (code == 13) ? false : true;
   });
    function preencher_revisao(){
        $("#nomeREV").val($("#nome").val()+" "+$("#sobrenome").val());
        $("#cpfREV").val($("#cpf").val());
        $("#dataREV").val($("#data_nasc").val());
        $("#rgREV").val($("#rg").val());
        $("#orgaoREV").val($("#orgao_emissor :selected").text());
        $("#ufREV").val($("#uf_emissor").val())
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
        $("#nome_esc_REV").val($("#nome_escola :selected").text());
        if($("#candidato_estudante").is(":checked")){
            $("#MAT_REV").show();
            $("#SERIE_REV").show();
            $("#REV_FORMADO").hide();
            $("#matREV").val($("#matricula").val());
            $("#serieREV").val($("#serie").val()+"/"+$("#turma").val()+" - "+$("#turno").val());
        }else{
            $("#MAT_REV").hide();
            $("#SERIE_REV").hide();
            $("#REV_FORMADO").show();
            $("#conclusaoREV").val($("#ano_conclusao").val());
        }
    };
    $("#periodo_trabalho").change(function(){
        $("#FormularioAlunos").validate().element("#periodo_trabalho");
    });
    $("#carga_horaria_trabalho").change(function(){
        $("#FormularioAlunos").validate().element("#carga_horaria_trabalho");
    });
    $("#trabalho").change(function(){
        if($(this).val()=="Não trabalho"){
            $("#periodo_trabalho").val("Não trabalha").prop("disabled", true).change();
            $("#carga_horaria_trabalho").val("Não trabalha").prop("disabled", true).change();
        }else{
            $("#periodo_trabalho").val("null").prop("disabled", false).change();
            $("#carga_horaria_trabalho").val("null").prop("disabled", false).change();
        }
    });
    $("#telefone_cand").change(function(){
        tipo_telefone($(this).val());
    });
    $("#telefone_resp").change(function(){
        tipo_telefone($(this).val());
    });
    $("#EncerrarInscricao").on("click", function(){
        event.preventDefault();
        $("#FormularioAlunos").validate().resetForm();
        $("#FormularioAlunos").each(function(){
            this.reset();
            $(this).find(".is-valid").removeClass("is-valid");
        })
        $("#FormularioAlunos input").val("");
        $("#FormularioAlunos select").val("null");
        $(location).attr('href', 'https://pes.ufsc.br/processo-seletivo/alunos');
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
        var $form = $("#FormularioAlunos");
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
            $("#SALVANDO_RESPOSTA").hide();
            $("#FINALIZAR_ERRO_SERVIDOR").show();
            $("#EncerrarInscricao").prop("disabled", false);
        });
        request.always(function () {
            $inputs.prop("disabled", false);
        });
    };
    function confirmar_revisao(){
        if($("#ConfirmacaoRevisao").is(":checked")){
            return true;
        }else{
            $("#ErroConfirmacaoRevisao").show();
            return false;
        }
    };
    $("#ConfirmacaoRevisao").on("click", function(){
        if($(this).is(":checked")){
            $("#ErroConfirmacaoRevisao").hide();
        }
    });
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
    
    $("#bairro").change( function(){
        $("#FormularioAlunos").validate().element("#bairro");
    });
    $("#endereco").change( function(){
        $("#FormularioAlunos").validate().element("#endereco");
    });
    $("#cidade").change( function(){
        $("#FormularioAlunos").validate().element("#cidade");
    });
    $("#uf").change( function(){
        $("#FormularioAlunos").validate().element("#uf");
    });
    $("#idade").change( function(){
        $("#FormularioAlunos").validate().element("#idade");
    });
    $("#nome_escola").change( function(){
        $("#FormularioAlunos").validate().element("#nome_escola");
    });
    $("#cidade_escola").change( function(){
        $("#FormularioAlunos").validate().element("#cidade_escola");
    });
    $("#uf_escola").change( function(){
        $("#FormularioAlunos").validate().element("#uf_escola");
    });
    function oculta_tudo(){
        $("#INICIO").addClass("d-none");
        $("#DADOS_PESSOAIS").addClass("d-none");
        $("#DADOS_ESCOLARES").addClass("d-none");
        $("#DADOS_ADICIONAIS").addClass("d-none");
        $("#REVISAR_ENVIAR").addClass("d-none");
        remove_sel_botao();
    }
    function remove_sel_botao(){
        $("#BotaoInicio").removeClass("btn-ativo");
        $("#BotaoDadosPessoais").removeClass("btn-ativo");
        $("#BotaoDadosEscolares").removeClass("btn-ativo");
        $("#BotaoDadosAdicionais").removeClass("btn-ativo");
        $("#BotaoRevisarEnviar").removeClass("btn-ativo");
    }
    function validacao(limite){
        oculta_tudo();
        var validator = $("#FormularioAlunos").validate();
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
                validator.element("#email");
                return;
            }
            if(validator.form()){
                $("#DADOS_PESSOAIS").addClass("d-none");
                $("#DADOS_ESCOLARES").removeClass("d-none");
                if(limite=="BotaoDadosEscolares"){
                    $("#BotaoDadosEscolares").addClass("btn-ativo");
                    return;
                }
                if(validator.form()){
                    $("#DADOS_ESCOLARES").addClass("d-none");
                    $("#DADOS_ADICIONAIS").removeClass("d-none");
                    if(limite=="BotaoDadosAdicionais"){
                        $("#BotaoDadosAdicionais").addClass("btn-ativo");
                        return;
                    }
                    var aux1 = validator.form();
                    var aux2 = validar_pesquisa_divulgacao(); 
                    if(aux1 && aux2){
                        $("#DADOS_ADICIONAIS").addClass("d-none");
                        $("#REVISAR_ENVIAR").removeClass("d-none");
                        $("#BotaoRevisarEnviar").addClass("btn-ativo");
                        preencher_revisao();
                    }else{
                        $("#BotaoDadosAdicionais").addClass("btn-ativo");
                        $("#BotaoMensagemErro").click();
                    }
                }else{
                    $("#BotaoDadosEscolares").addClass("btn-ativo");
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
    $("#BotaoDadosEscolares").on("click", function(){
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
        $("#BotaoDadosEscolares").click();
    });
    $("#Proximo02").on("click", function(){
        event.preventDefault();
        $("#BotaoDadosAdicionais").click();
    });
    $("#Proximo03").on("click", function(){
        event.preventDefault();
        $("#BotaoRevisarEnviar").click();
    });
    $("#Proximo04").on("click", function(){
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
        $("#FormularioAlunos").validate().resetForm();
        $("#FormularioAlunos").each(function(){
            this.reset();
            $(this).find(".is-valid").removeClass("is-valid");
        })
        $(location).attr('href', 'https://pes.ufsc.br/processo-seletivo/alunos');
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
        $("#DADOS_ESCOLARES").addClass("d-none");
        $("#BotaoDadosEscolares").removeClass("btn-ativo");
        $("#DADOS_PESSOAIS").removeClass("d-none");
        $("#BotaoDadosPessoais").addClass("btn-ativo");
    });
    $("#Anterior03").on("click", function(){
        event.preventDefault();
        $("#DADOS_ADICIONAIS").addClass("d-none");
        $("#BotaoDadosAdicionais").removeClass("btn-ativo");
        $("#DADOS_ESCOLARES").removeClass("d-none");
        $("#BotaoDadosEscolares").addClass("btn-ativo");
    });
    $("#Anterior04").on("click", function(){
        event.preventDefault();
        $("#REVISAR_ENVIAR").addClass("d-none");
        $("#BotaoRevisarEnviar").removeClass("btn-ativo");
        $("#DADOS_ADICIONAIS").removeClass("d-none");
        $("#BotaoDadosAdicionais").addClass("btn-ativo");
    });
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
    function reset_validador_escola(){
        $("#DADOS_ESCOLARES").find(".error").each(function(){
            $(this).remove();
        });
        $("#DADOS_ESCOLARES").find("input").each(function(){
            $(this).removeClass("is-valid").removeClass("is-invalid");
        });
        $("#DADOS_ESCOLARES").find("select").each(function(){
            $(this).removeClass("is-valid").removeClass("is-invalid");
        });
    };
    
    function reset_formado(){
        $("#ano_conclusao").val(""); 
        reset_escola();
        reset_validador_escola();
    }
    
    function reset_estudante(){
        $("#matricula").val("");
        $("#serie").val("null");
        $("#turma").val("");
        $("#turno").val("null");
        reset_escola();
        reset_validador_escola();
    }
    
    function reset_escola() {
        $("#nome_escola").val("null");
        $("#cidade_escola").val("").change();
        $("#uf_escola").val("").change();
        reset_nova_escola();
    }
    
    function reset_nova_escola() {
        $("#nome_nova_escola").val("");
        $("#cidade_nova_escola").val("");
        $("#uf_nova_escola").val("null");
        $("#NOVA_ESCOLA").hide();
        $("#nome_escola option[value='novo']").remove();
    }
    
    $("#adicionar_escola").on("click", function(){
        var validator = $("#FormularioAlunos").validate();
        var v1 = validator.element("#nome_nova_escola");
        var v2 = validator.element("#cidade_nova_escola");
        var v3 = validator.element("#uf_nova_escola");
        if(v1 && v2 && v3){
            $("#nome_escola").append($("<option>",{
                value: "novo",
                text: $("#nome_nova_escola").val()
            }));
            $("#nome_escola").val("novo").change();
            $("#cidade_escola").val($("#cidade_nova_escola").val()).change();
            $("#uf_escola").val($("#uf_nova_escola").val()).change();
            $("#NOVA_ESCOLA").hide();
        }
    });
    
    $("#nome_escola").on("change", function(){
        var valor = $("#nome_escola").val();
        if(valor=="outra"){
            reset_nova_escola();
            $("#NOVA_ESCOLA").show();
            $("#cidade_escola").val("").change();
            $("#uf_escola").val("").change();
        }else if(valor=="null"){
            reset_escola();
        }else if(valor!="novo"){
            reset_nova_escola();
            $("#cidade_escola").val("Araranguá").change();
            $("#uf_escola").val("SC").change();
        }
    });
    
    $("#candidato_estudante").on("click", function(){
        $("#candidato_estudante").prop("checked", true);
        $("#candidato_formado").prop("checked", false);
        $("#DADOS_ESTUDANTE").show();
        $("#DADOS_FORMADO").hide();
        $("#LabelNomeEscolaFormado").hide();
        $("#LabelNomeEscolaEstudante").show();
        reset_formado();
    });
    
    $("#candidato_formado").on("click", function(){
        $("#candidato_estudante").prop("checked", false);
        $("#candidato_formado").prop("checked", true);
        $("#DADOS_ESTUDANTE").hide();
        $("#DADOS_FORMADO").show();
        $("#LabelNomeEscolaFormado").show();
        $("#LabelNomeEscolaEstudante").hide();
        reset_estudante();
    });
})