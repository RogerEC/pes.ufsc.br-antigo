$(document).ready(function(){
    $("#EnviarRealizarCadastro").on("click", function(){
        $("#FormularioRealizarCadastro").submit();
    });
    $("#BotaoCadastrar").on("click", function(){
        $("#BotaoCadastrarOculto").click();
    });
    // Validação
    jQuery.validator.addMethod("cpf", function(value, element) {
        var cpf = value.replace(/[^\d]+/g,'');
        if(cpf.length < 11) return this.optional(element) || false;
        var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
        var a = [];
        var b = new Number;
        var c = 11;
        for (i=0; i<11; i++){
            a[i] = cpf.charAt(i);
            if (i < 9) b += (a[i] * --c);
        }
        if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
        b = 0;
        c = 11;
        for (y=0; y<10; y++) b += (a[y] * c--);
        if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }

        var retorno = true;
        if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;

        return this.optional(element) || retorno;
    
    }, "CPF inválido");
    
    $("#FormularioRealizarCadastro").validate({
        rules : {
            cpf:{
                cpf: true,
                required: true,
            }                         
        },
        messages:{
            cpf:{
                required:"Informe o seu CPF",
                cpf:"Número de CPF inválido.",
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass("is-invalid").addClass("is-valid");
        }
    });
})