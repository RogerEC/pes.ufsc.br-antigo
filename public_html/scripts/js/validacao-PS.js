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

 $("#FormularioRealizarInscricao").validate({
    rules : {
        email:{
            required: true,
            email: true,
            /*remote:{
                url: "/processo-seletivo/verifica-email.php",
                type: "post"
            }*/
        },
        cpf:{
            cpf: true,
            required: true,
            remote:{
                url: "/processo-seletivo/verifica-cpf.php",
                type: "post"
            }
        },
        senha:{
            required: true,
            minlength: 6,
            maxlength: 20
        },
        confirme_senha:{
            required: true,
            equalTo: "#senha_insc"
        }                            
    },
    messages:{
        email:{
            required: "Informe o seu endereço de e-mail.",
            email: "Endereço de e-mail inválido.",
            remote: "Este endereço de e-mail já está cadastrado, informe outro endereço."
        },
        cpf:{
            required:"Informe o seu CPF",
            cpf:"Número de CPF inválido.",
            remote: "Este número de CPF já está cadastrado. <p class='notif-form-insc'>Para acompanhar a sua inscrição <spam class='link-form-insc IrParaLogin'>clique aqui</spam></p>"
        },
        senha:{
            required: "Informe uma senha.",
            minlength: "A senha precisa ter pelo menos 6 caracteres",
            maxlength: "A senha precisa ter no máximo 20 caracteres"
        },
        confirme_senha:{
            required: "Confirme a sua senha.",
            equalTo: "As senhas não coincidem."
        }
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function(element, errorClass, validClass) {
       $(element).removeClass("is-invalid").addClass("is-valid");
    }
});

$("#FormularioAcompanharInscricao").validate({
    rules : {
        cpf:{
            cpf: true,
            required: true,
            remote:{
                url: "/processo-seletivo/verifica-usuario.php",
                type: "post"
            }
        },
        senha:{
            required: true,
            minlength: 6,
            maxlength: 20
        },                          
    },
    messages:{
        cpf:{
            required:"Informe o seu CPF",
            cpf:"Número de CPF inválido.",
            remote: "Usuário não encontrado. <p class='notif-form-insc'>Para realizar a sua inscrição <spam class='link-form-insc IrParaInscricao' id='ErroCPF404_Acompanhar'>clique aqui</spam></p>"
        },
        senha:{
            required: "Informe a sua senha.",
            minlength: "A senha precisa ter pelo menos 6 caracteres",
            maxlength: "A senha precisa ter no máximo 20 caracteres"
        },
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function(element, errorClass, validClass) {
       $(element).removeClass("is-invalid").addClass("is-valid");
    }
});

$("#FormularioRecuperarSenha").validate({
    rules : {
        cpf:{
            cpf: true,
            required: true,
            remote:{
                url: "/processo-seletivo/verifica-usuario.php",
                type: "post"
            }
        }                         
    },
    messages:{
        cpf:{
            required:"Informe o seu CPF",
            cpf:"Número de CPF inválido.",
            remote: "Usuário não encontrado. <p class='notif-form-insc'>Caso deseje realizar a sua inscrição <spam class='link-form-insc IrParaInscricao' id='ErroCPF404_Recuperar'>clique aqui</spam></p>"
        }
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function(element, errorClass, validClass) {
       $(element).removeClass("is-invalid").addClass("is-valid");
    }
});