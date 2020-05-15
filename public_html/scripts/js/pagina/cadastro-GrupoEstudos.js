$(document).ready(function(){
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
    $("#EncerrarInscricao").on("click", function(){
        event.preventDefault();
        $("#FormularioAlunos").validate().resetForm();
        $("#FormularioAlunos").each(function(){
            this.reset();
            $(this).find(".is-valid").removeClass("is-valid");
        })
        $("#FormularioAlunos input").val("");
        $("#FormularioAlunos select").val("null");
        $(location).attr('href', 'https://pes.ufsc.br/grupo-de-estudos');
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
        var $inputs = $form.find("input, select");
        var serializedData = $form.serializeArray();
        $inputs.prop("disabled", true);
        request = $.ajax({
            url: "salvar-cadastro.php",
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
});