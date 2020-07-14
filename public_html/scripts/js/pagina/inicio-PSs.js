$(document).ready(function(){
    $("#EnviarRealizarInscricao").on("click", function(){
        $("#FormularioRealizarInscricao").submit();
    });
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
});