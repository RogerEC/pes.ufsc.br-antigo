$(document).ready(function(){
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
    $('.popover-dismiss').popover({
        trigger: 'focus'
    })

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
        var $form = $("#FormularioAlunos");
        var serializedData = $form.serializeArray();
        request = $.ajax({
            url: "/processo-seletivo/alunos/carregar-info-inscrito.php",
            type: "post",
            data: serializedData
        });
        request.done(function(msg){

            const info_aluno = JSON.parse(msg);
            // preenchendo campos
            $("#nome").val(info_aluno.nome).blur();
            $("#sobrenome").val(info_aluno.sobrenome).blur();
            $("#sexo").val(info_aluno.sexo).blur();
            $("#data_nasc").val(info_aluno.data_nasc).blur();
            $("#email").val(info_aluno.email).blur();
            $("#telefone").val(info_aluno.telefone).blur();
            $("#bairro").val(info_aluno.bairro).blur();
            $("#cidade").val(info_aluno.cidade).blur();
            $("#uf").val(info_aluno.estado).blur();
            $("#tipo_aluno").val(info_aluno.tipo_aluno).blur().change();
            if(info_aluno.tipo_aluno=="Está cursando o ensino médio"){
                $("#nome_escola").val(info_aluno.nome_escola).blur();
                $("#cidade_escola").val(info_aluno.cidade_escola).blur();
                $("#uf_escola").val(info_aluno.uf_escola).blur();
                $("#matricula").val(info_aluno.matricula).blur();
                $("#serie").val(info_aluno.serie).blur();
                $("#turma").val(info_aluno.turma).blur();
                $("#turno").val(info_aluno.turno).blur();
            }else{
                $("#ano_conclusao").val(info_aluno.ano_conclusao).blur();
            }   
            $("#rotina_estudo").val(info_aluno.rotina_estudo).blur();
            $("#dias_estudo").val(info_aluno.dias_estudo).blur();
            $("#tempo_estudo").val(info_aluno.tempo_estudo).blur();
            $("#fez_vestibular").val(info_aluno.fez_vest).blur();
            $("#curso").val(info_aluno.curso).blur();
            $("#tipo_universidade").val(info_aluno.tipo_uni).blur();
            $("#trabalho").val(info_aluno.trabalho).blur();
            $("#periodo_trabalho").val(info_aluno.periodo_ocupacao).blur();
            $("#carga_horaria_trabalho").val(info_aluno.carga_horaria_trabalho).blur();

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

    $("#FormularioAlunos").validate().element("#cpf");
    $('input').keypress(function (e) {
        var code = null;
        code = (e.keyCode ? e.keyCode : e.which);                
        return (code == 13) ? false : true;
    });
    $("#telefone").change(function(){
        tipo_telefone($(this).val());
    });
    $("#idade").change( function(){
        $("#FormularioAlunos").validate().element("#idade");
    });
    $("#EncerrarInscricao").on("click", function(event){
        event.preventDefault();
        $("#FormularioAlunos").validate().resetForm();
        $("#FormularioAlunos").each(function(){
            this.reset();
            $(this).find(".is-valid").removeClass("is-valid");
        })
        $("#FormularioAlunos input").val("");
        $("#FormularioAlunos select").val("null");
        $(location).attr('href', 'https://pes.ufsc.br/processo-seletivo/alunos/');
    });
    $("#BotaoFinalizar").on("click", function(event){
        event.preventDefault();
        $("#EncerrarInscricao").click();
    });
    var request;
    function enviar_formulario(){
        if (request) {
            request.abort();
        }
        var $form = $("#FormularioAlunos");
        var $inputs = $form.find("input, select");
        var serializedData = $form.serializeArray();
        $inputs.prop("disabled", true);
        request = $.ajax({
            url: "salvar-cadastro.php",
            type: "post",
            data: serializedData
        });
        request.done(function (response, textStatus, jqXHR){
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
    $("#EnviarCadastro").on("click", function(){
        console.log("Enviar entrou");
        event.preventDefault();
        if($("#FormularioAlunos").validate().form()){
            $("#DADOS_PESSOAIS").addClass("d-none");
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

    $("#data_nasc").blur(function(){
        var aux = $(this).val().replace(/[^\d]+/g,'');
        if(aux.length==8){
            var data = $(this).val().split("/");
            var hoje = new Date();
            var aniversario = new Date(data[2], data[1]-1, data[0]);
            var idade = Math.floor((hoje.getTime()-aniversario.getTime())/31557600000);
            $("#idade").val(idade).change();
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
        reset_validador_escola();
    }
    
    function reset_estudante(){
        $("#nome_escola").val("");
        $("#cidade_escola").val("");
        $("#uf_escola").val("null");
        $("#matricula").val("");
        $("#serie").val("null");
        $("#turma").val("");
        $("#turno").val("null");
        $("#escola_quarentena").val("null");
        reset_validador_escola();
    }
    
    $("#tipo_aluno").on("change", function(){
        var valor = $("#tipo_aluno").val();
        if(valor=="Está cursando o ensino médio"){
            $("#DADOS_ESTUDANTE").show();
            $("#DADOS_FORMADO").hide();
            reset_formado();
        }else if(valor=="Já concluiu o ensino médio"){
            $("#DADOS_ESTUDANTE").hide();
            $("#DADOS_FORMADO").show();
            reset_estudante();
        }else{
            reset_estudante();
            reset_formado();
        }
    });

    $("#trabalho").on("change", function(){
        var valor = $(this).val();
        if(valor=="Não trabalho"){
            $("#periodo_trabalho").val("Não trabalha").blur();
            $("#carga_horaria_trabalho").val("Não trabalha").blur();
            $("#trabalho_quarentena").val(valor).blur();
        }else{
            if($("#periodo_trabalho").val()=="Não trabalha"){
                $("#periodo_trabalho").val("null").removeClass("is-valid").removeClass("is-invalid");
                $("#periodo_trabalho").parent().find(".error").each(function(){
                    $(this).remove();
                });
            }
            if($("#carga_horaria_trabalho").val()=="Não trabalha"){
                $("#carga_horaria_trabalho").val("null").removeClass("is-valid").removeClass("is-invalid");
                $("#carga_horaria_trabalho").parent().find(".error").each(function(){
                    $(this).remove();
                });
            }
            if($("#trabalho_quarentena").val()=="Não trabalho"){
                $("#trabalho_quarentena").val("null").removeClass("is-valid").removeClass("is-invalid");
                $("#trabalho_quarentena").parent().find(".error").each(function(){
                    $(this).remove();
                });
            }
        }
    });
});