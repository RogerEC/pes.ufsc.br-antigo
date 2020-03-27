$(document).ready(function(){
    /*$("#EnviarRecuperarSenha").on("click", function(){
        $("#FormularioRecuperarSenha").submit();
    });
    $("#EnviarAcompanharInscricao").on("click", function(){
        $("#FormularioAcompanharInscricao").submit();
    });*/
    $("#EnviarRealizarInscricao").on("click", function(){
        $("#FormularioRealizarInscricao").submit();
    });
    /*$("#EsqueceuSenha").on('click', function(){
        if($("#cpf_login").hasClass("is-valid")){
            $("#cpf_RecSenha").addClass("is-valid");
        }else if($("#cpf_login").hasClass("is-invalid")){
            $("#cpf_RecSenha").addClass("is-invalid");
        }
        $("#cpf_RecSenha").val($("#cpf_login").val());
        $("#BotaoCancelarAcompanhar").click();
        $("#BotaoRecuperarOculto").click();
    });
    $("form").on('click', '.IrParaInscricao',function(){
        if($(this).attr("id")=="ErroCPF404_Acompanhar"){
            var cpf = $("#cpf_login").val();
            var str = "Acompanhar";
        }else{
            var cpf = $("#cpf_RecSenha").val();
            var str = "Recuperar";
        }
        $("#cpf_insc").val(cpf);
        $("#cpf_insc").addClass("is-valid");
        $("#BotaoCancelar"+str).click();
        $("#BotaoInscreverOculto").click();
    });
    $("form").on('click', '.IrParaLogin', function(){
        $("#cpf_login").val($("#cpf_insc").val());
        $("#cpf_login").addClass("is-valid");
        $("#BotaoCancelarInscrever").click();
        $("#BotaoAcompanharOculto").click();
    });*/
    $(".cancelar-formulario").on("click", function(){
        $($(this).val()).validate().resetForm();
        $($(this).val()).each(function(){
            this.reset();
            $(this).find(".is-valid").removeClass("is-valid");
        })
    });
    $("#BotaoInscrever").on("click", function(){
        $("#BotaoInscreverOculto").click();
    });
    $("#BotaoAcompanhar").on("click", function(){
        $("#BotaoAcompanharOculto").click();
    });
});