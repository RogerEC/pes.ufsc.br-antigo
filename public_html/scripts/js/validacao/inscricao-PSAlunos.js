$("#FormularioAlunos").validate({
    rules : {
        nome:{required: true},
        sobrenome:{required:true},
        sexo:{select:true},
        rg:{required:true},
        orgao_emissor:{select:true},
        uf_emissor:{select:true},
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
        email:{required:true},
        telefone_cand:{required:true, telefone: true},
        cep:{
            required:true,
            cep_valido: true,
            remote:{
                url: "/processo-seletivo/verifica-cep.php",
                type:"post"
            }
        },
        endereco:{required:true},
        numero:{
            required:true,
            number: true
        },
        complemento:{},
        bairro:{required:true},
        cidade:{required:true},
        uf:{required:true},
        nome_escola:{
            select:true,
            select_outra:true
        },
        cidade_escola:{required:true},
        uf_escola:{required:true},
        nome_nova_escola:{required:true},
        cidade_nova_escola:{required:true},
        uf_nova_escola:{select:true},
        matricula:{
            required:true,
            number: true
        },
        serie:{select:true},
        turma:{required:true},
        turno:{select:true},
        ano_conclusao:{required:true, range:[1900, 2019], number:true},
        trabalho:{select:true},
        periodo_trabalho:{select:true},
        carga_horaria_trabalho:{select:true},
        rotina_estudo:{select:true},
        dias_estudo:{select:true},
        tempo_estudo:{select:true},
        origem_trajeto:{select:true},
        transporte:{select:true},
        tempo_trajeto:{select:true},
        fez_vestibular:{select:true},
        curso:{select:true},
        tipo_universidade:{select:true},
    },
    messages:{
        nome:{required:"Informe o seu nome."},
        sobrenome:{required:"Informe o seu sobrenome."},
        sexo:{select:"Informe o seu sexo."},
        rg:{required:"Informe o seu número de RG."},
        orgao_emissor:{select:"Informe o orgão emissor do seu RG."},
        uf_emissor:{select:"Informe o UF de emissão do seu RG."},
        cpf:{required:"ERRO CRÍTICO! Volte na página do processo seletivo de alunos e reinicie a sua inscrição."},
        data_nasc:{
            required:"Informe a sua data de nascimento.",
            data_valida:"Informe uma data de nascimento válida."
        },
        idade:{
            required: "Erro ao calcular idade, corrija a sua data de nascimento.",
            idade_max: "Você precisa ter 150 anos ou menos para se inscrever.",
            idade_min: "Você precisa ter pelo menos 16 anos para se inscrever."
        },
        nome_resp:{required:"Informe o nome do responsável."},
        parentesco:{select: "Informe o parentesco do responsável."},
        cpf_resp:{
            required: "Informe o número de CPF do responsável.",
            cpf:"O número de CPF é inválido."
        },
        telefone_resp:{required:"Informe o número de telefone do responsável."},
        email:{required:"ERRO CRÍTICO! Volte na página do processo seletivo de alunos e reinicie a sua inscrição."},
        telefone_cand:{required:"Informe o seu número de telefone."},
        cep:{
            required:"Informe o seu CEP.",
            cep_valido: "O CEP informado é inválido.",
            remote: "O CEP informado não foi encontrado."
        },
        endereco:{required:"Informe a sua rua ou corrija o número do CEP."},
        numero:{
            required:"Informe o número da sua moradia.",
            number: "Preencha apenas com números."
        },
        bairro:{required:"Informe o seu bairro ou corrija o número do CEP."},
        cidade:{required:"Corrija o número do CEP."},
        uf:{required:"Corrija o número do CEP."},
        nome_escola:{
            select:"Selecione o nome da sua escola.",
            select_outra:"Informe os dados da sua escola abaixo."
        },
        cidade_escola:{required:"Selecione o nome da sua escola."},
        uf_escola:{required:"Selecione o nome da sua escola."},
        nome_nova_escola:{required:"Informe o nome da sua escola."},
        cidade_nova_escola:{required:"Informe a cidade da sua escola."},
        uf_nova_escola:{select:"Informe o UF da sua escola."},
        matricula:{
            required:"Informe o número da sua matrícula.",
            number: "Informe apenas números"
        },
        serie:{select:"Selecione a sua série."},
        turma:{required:"Informe a sua turma."},
        turno:{select:"Selecione o seu turno de estudo."},
        ano_conclusao:{
            required:"Informe o ano que você concluiu o ensino médio.",
            range:"O ano de conclusão deve estar entre 1900 a 2019.",
            number:"Digite apenas números."},
        trabalho:{select:"Selecione se você trabalha ou não."},
        periodo_trabalho:{select:"Selecione o período de trabalho."},
        carga_horaria_trabalho:{select:"Selecione a carga horária do seu trabalho."},
        rotina_estudo:{select:"Selecione se você possui uma rotina de estudos ou não."},
        dias_estudo:{select:"Selecione quantos dias por semana você reserva para estudar."},
        tempo_estudo:{select:"Selecione quanto tempo por dia você reserva para estudar."},
        origem_trajeto:{select:"Seleciode de onde você virá para as aulas do Cursinho."},
        transporte:{select:"Selecione qual meio de transporte você irá utilizar para vir para as aulas do Cursinho."},
        tempo_trajeto:{select:"Selecione quanto tempo irá levar o trajeto até você chegar do Cursinho."},
        fez_vestibular:{select:"Selecione se alguma vez você já fez vestibular/ENEM."},
        curso:{select:"Selecione em qual curso você deseja entrar na universidade."},
        tipo_universidade:{select:"Selecione em qual tipo de universidade você deseja entrar."},

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

jQuery.validator.addMethod("select_outra", function(value, element) {
    if(value=="outra"){
        return this.optional(element) || false;
    }else{
        return this.optional(element) || true;
    }
}, "Informe os dados abaixo"); 

jQuery.validator.addMethod("cep_valido", function(value, element) {
    var cep = value.replace(/\D/g, '');
    if (cep != "") {
        var validacep = /^[0-9]{8}$/;
        if(validacep.test(cep)) {
            return this.optional(element) || true;
        }
    }
    return this.optional(element) || false;
}, "O CEP é inválido.");

jQuery.validator.addMethod("select", function(value, element) {
    if(value=="null"){
        return this.optional(element) || false;
    }else{
        return this.optional(element) || true;
    }
 }, "Selecione algo.");

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