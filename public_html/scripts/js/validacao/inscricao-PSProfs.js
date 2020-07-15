$("#FormularioProfessores").validate({
    rules : {
        nome:{required: true},
        sobrenome:{required:true},
        sexo:{select:true},
        cpf:{required:true},
        data_nasc:{
            required:true,
            data_valida:true
        },
        idade:{
            required: true,
            idade_max: true,
            idade_min: true,
            idade_valida: true
        },  
        nome_resp:{required:true},
        parentesco:{select: true},
        cpf_resp:{
            required: true,
            cpf:true
        },
        telefone_resp:{required:true, telefone: true},
        email:{required:true, email:true},
        telefone_cand:{required: true, telefone: true},
        materia01:{select: true},
        materia02:{select_op2: true},
        materia03:{
            select_op2: true,
            select_op3: true
        },
        materia_especifica:{
            required: true,
            minlength: 20,
            maxlength: 1000
        },
        porque_educacao:{
            required: true,
            minlength: 20,
            maxlength: 1000
        },
        porque_entrar:{
            required: true,
            minlength: 20,
            maxlength: 1000
        },
        como_ajudar:{
            required: true,
            minlength: 20,
            maxlength: 1000
        },
        quantas_horas:{select: true},
        relacao_cursinho:{select: true},
        ocupacao:{select: true},
        curso:{select: true},
        fase:{
            required: true,
            number: true
        },
        matricula:{
            required: true,
            number: true
        },
        outros_projetos:{select: true},
        nome_projeto0:{required:true},
        nome_projeto1:{required:true},
        nome_projeto2:{required:true},
        nome_projeto3:{required:true},
        nome_projeto4:{required:true},
        carga_horaria_projeto0:{required:true,number:true},
        carga_horaria_projeto1:{required:true,number:true},
        carga_horaria_projeto2:{required:true,number:true},
        carga_horaria_projeto3:{required:true,number:true},
        carga_horaria_projeto4:{required:true,number:true},
        outros_projetos_antigo:{select: true},
        nome_projeto_antigo0:{required:true},
        nome_projeto_antigo1:{required:true},
        nome_projeto_antigo2:{required:true},
        nome_projeto_antigo3:{required:true},
        nome_projeto_antigo4:{required:true},
        voluntario:{select: true},
        exp_voluntario:{
            required: true,
            minlength: 20,
            maxlength: 1000
        },
    },
    messages:{
        nome:{required:"Informe o seu nome."},
        sobrenome:{required:"Informe o seu sobrenome."},
        sexo:{select:"Selecione o seu sexo."},
        cpf:{required:"ERRO CRÍTICO! Volte na página do processo seletivo de alunos e reinicie a sua inscrição."},
        data_nasc:{
            required:"Informe a sua data de nascimento.",
            data_valida:"Informe uma data de nascimento válida."
        },
        idade:{
            required: "Erro ao calcular idade, corrija a sua data de nascimento.",
            idade_max: "Você precisa ter 150 anos ou menos para se inscrever.",
            idade_min: "Você precisa ter 16 anos ou mais para poder se inscrever."
        },
        nome_resp:{required:"Informe o nome do seu responsável."},
        parentesco:{select: "Informe o parentesco do seu responsável."},
        cpf_resp:{
            required: "Informe o número de CPF do seu responsável.",
            cpf:"O número de CPF é inválido."
        },
        telefone_resp:{required:"Informe o número de telefone do seu responsável."},
        email:{required:"Por favor, informe o seu endereço de e-mail.",
                email:"Endereço de e-mail inválido!"},
        telefone_cand:{required:"Informe o seu número de telefone."},
        materia01:{select: "Selecione sua primeira opção de matéria."},
        materia_especifica:{
            required: "Informe quais tópicos das matérias selecionadas você tem melhor domínio.",
            minlength: "Sua resposta precisa ter no <b>mínimo 20 caracteres.</b>",
            maxlength: "Sua resposta deve ter no <b>máximo 1000 caracteres.</b>"
        },
        porque_educacao:{
            required: "Informe o que te motiva a trabalhar com educação.",
            minlength: "Sua resposta precisa ter no <b>mínimo 20 caracteres.</b>",
            maxlength: "Sua resposta deve ter no <b>máximo 1000 caracteres.</b>"
        },
        porque_entrar:{
            required: "Informe porque você quer entrar no Cursinho PES.",
            minlength: "Sua resposta precisa ter no <b>mínimo 20 caracteres.</b>",
            maxlength: "Sua resposta deve ter no <b>máximo 1000 caracteres.</b>"
        },
        como_ajudar:{
            required: "Informe como você acredita ajudar estando dentro do Cursinho PES.",
            minlength: "Sua resposta precisa ter no <b>mínimo 20 caracteres.</b>",
            maxlength: "Sua resposta deve ter no <b>máximo 1000 caracteres.</b>"
        },
        quantas_horas:{select: "Selecione até quantas horas semanais você pode dedicar ao projeto."},
        relacao_cursinho:{select: "Selecione a sua relação com o Cursinho PES."},
        ocupacao:{select: "Selecione a sua principal ocupação."},
        curso:{select: "Selecione o seu curso."},
        fase:{
            required: "Informe a sua fase.",
            number: "Digite apenas números."
        },
        matricula:{
            required: "Informe a sua matrícula.",
            number: "Digite apenas números."
        },
        outros_projetos:{select: "Selecione se atualmente você participa de outros projetos na UFSC."},
        nome_projeto0:{required:"Informe o nome do projeto/atividade."},
        nome_projeto1:{required:"Informe o nome do projeto/atividade."},
        nome_projeto2:{required:"Informe o nome do projeto/atividade."},
        nome_projeto3:{required:"Informe o nome do projeto/atividade."},
        nome_projeto4:{required:"Informe o nome do projeto/atividade."},
        carga_horaria_projeto0:{required:"Informe a carga horária semanal do projeto/atividade.",number:"Digite apenas números."},
        carga_horaria_projeto1:{required:"Informe a carga horária semanal do projeto/atividade.",number:"Digite apenas números."},
        carga_horaria_projeto2:{required:"Informe a carga horária semanal do projeto/atividade.",number:"Digite apenas números."},
        carga_horaria_projeto3:{required:"Informe a carga horária semanal do projeto/atividade.",number:"Digite apenas números."},
        carga_horaria_projeto4:{required:"Informe a carga horária semanal do projeto/atividade.",number:"Digite apenas números."}, 
        outros_projetos_antigo:{select: "Selecione se você já participou de algum projeto/atividade na UFSC."},
        nome_projeto_antigo0:{required:"Informe o nome do projeto/atividade."},
        nome_projeto_antigo1:{required:"Informe o nome do projeto/atividade."},
        nome_projeto_antigo2:{required:"Informe o nome do projeto/atividade."},
        nome_projeto_antigo3:{required:"Informe o nome do projeto/atividade."},
        nome_projeto_antigo4:{required:"Informe o nome do projeto/atividade."},
        voluntario:{select: "Selecione se você já trabalhou como voluntário."},
        exp_voluntario:{
            required: "Informe a sua experiência como voluntário. Se você nunca trabalhou como voluntário, corrija a resposta da questão anterior.",
            minlength: "Sua resposta precisa ter no <b>mínimo 20 caracteres.</b>",
            maxlength: "Sua resposta deve ter no <b>máximo 1000 caracteres.</b>"
        },
        
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function(element, errorClass, validClass) {
       $(element).removeClass("is-invalid").addClass("is-valid");
    }
});

jQuery.validator.addMethod('telefone', function (value, element) {
    value = value.replace(/[^\d]+/g,'');
    if(value.length==11){
        if (value == '0000000000') {
            return (this.optional(element) || false);
        } else if (value == '00000000000') {
            return (this.optional(element) || false);
        } 
        if (["00", "01", "02", "03", "04", , "05", , "06", , "07", , "08", "09", "10"].indexOf(value.substring(0, 2)) != -1) {
            return (this.optional(element) || false);
        }
        if (value.length < 11 || value.length > 12) {
            return (this.optional(element) || false);
        }
        if (["9"].indexOf(value.substring(2, 3)) == -1) {
            return (this.optional(element) || false);
        }
        if (["6", "7", "8", "9"].indexOf(value.substring(3, 4)) == -1) {
            return (this.optional(element) || false);
        }
        return (this.optional(element) || true);
    }else{
        if (value == '0000000000') {
            return (this.optional(element) || false);
        } else if (value == '00000000000') {
            return (this.optional(element) || false);
        }
        if (["00", "01", "02", "03", , "04", , "05", , "06", , "07", , "08", "09", "10"].indexOf(value.substring(0, 2)) != -1) {
            return (this.optional(element) || false);
        }
        if (value.length < 10 || value.length > 11) {
            return (this.optional(element) || false);
        }
        if (["1", "2", "3", "4","5"].indexOf(value.substring(2, 3)) == -1) {
            return (this.optional(element) || false);
        }
        return (this.optional(element) || true);
    }   
}, 'Informe um número de telefone válido.'); 

jQuery.validator.addMethod("select_op2", function(value, element) {
    if(value==$("#materia01").val() && value!="null"){
        return this.optional(element) || false;
    }else{
        return this.optional(element) || true;
    }
}, "Selecione um valor diferente da sua 1ª OPÇÃO de matéria.");

jQuery.validator.addMethod("select_op3", function(value, element) {
    if(value==$("#materia02").val() && value!="null"){
        return this.optional(element) || false;
    }else{
        return this.optional(element) || true;
    }
}, "Selecione um valor diferente da sua 2ª OPÇÃO de matéria.");

jQuery.validator.addMethod("select_outra", function(value, element) {
    if(value=="outra"){
        return this.optional(element) || false;
    }else{
        return this.optional(element) || true;
    }
}, "Informe os dados abaixo");

jQuery.validator.addMethod("select", function(value, element) {
    if(value=="null"){
        return this.optional(element) || false;
    }else{
        return this.optional(element) || true;
    }
 }, "Selecione a sua resposta.");

jQuery.validator.addMethod("idade_min", function(value, element) {
    var idade = parseInt(value);
    if(idade<16){
        return this.optional(element) || false;
    }else{
        return this.optional(element) || true;
    }
 }, "Jovem demais.");

 jQuery.validator.addMethod("idade_max", function(value, element) {
    var idade = parseInt(value);
    if(idade>150){
        return this.optional(element) || false;
    }else{
        return this.optional(element) || true;
    }
 }, "Velho demais.");

jQuery.validator.addMethod("idade_valida", function(value, element) {
    if(value=="NaN")return this.optional(element) || false;
    return this.optional(element) || true;
 }, "Erro ao calcular idade, corrija sua data de nascimento.");

jQuery.validator.addMethod("data_valida", function(value, element) {
    var data = value.split("/");
    var hoje = new Date();
    var aniversario = new Date(data[2], data[1]-1, data[0]);
    if((hoje.getTime()-aniversario.getTime())<0) return this.optional(element) || false;
    var d = value.replace(/[^\d]+/g,'');
    if(d.length != 8) return this.optional(element) || false;
    var data = value.split("/")
    if(parseInt(data[1])==0 || parseInt(data[1])>12) return this.optional(element) || false;
    switch(parseInt(data[1])){
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            var dia = 31;
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            var dia = 30;
            break;
        case 2:
            var dia = 28;
            break;
    }
    if(parseInt(data[1])==2){
        if(parseInt(data[2])%4==0){
            if(parseInt(data[2])%100==0){
                if(parseInt(data[2])%400==0){
                    dia++;
                }
            }else{
                dia++;
            }
        }
    }
    if(parseInt(data[0])==0 || parseInt(data[0])>dia) return this.optional(element) || false;
    return this.optional(element) || true;
 }, "Data inválida.");

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