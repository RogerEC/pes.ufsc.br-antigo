$(document).ready(function() {

    function limpa_formulário_cep() {
        $("#endereco").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
    }
    
    $("#cep").blur(function() {

        var cep = $(this).val().replace(/\D/g, '');

        if (cep != "") {

            var validacep = /^[0-9]{8}$/;

            if(validacep.test(cep)) {

                $("#endereco").val("...");
                $("#endereco").attr('readonly', true);
                $("#bairro").val("...");
                $("#bairro").attr('readonly', true);
                $("#cidade").val("...");
                $("#uf").val("...");
                $("#tipo_endereco").val("completo");

                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        if(dados.logradouro==""){
                            $("#endereco").attr('readonly', false);
                            $("#endereco").attr('placeholder', "Digite a sua rua...");
                            $("#tipo_endereco").val("incompleto");
                        }else{
                            $("#endereco").attr('readonly', true);
                        }
                        if(dados.bairro==""){
                            $("#bairro").attr('readonly', false);
                            $("#bairro").attr('placeholder', "Digite o seu bairro...");
                            $("#tipo_endereco").val("incompleto");
                        }else{
                            $("#bairro").attr('readonly', true);
                        }
                        $("#endereco").val(dados.logradouro).change();
                        $("#bairro").val(dados.bairro).change();
                        $("#cidade").val(dados.localidade).change();
                        $("#uf").val(dados.uf).change();
                    }
                    else {
                        limpa_formulário_cep();
                    }
                });
            }
            else {
                limpa_formulário_cep();
            }
        }
        else {
            limpa_formulário_cep();
        }
    });
});