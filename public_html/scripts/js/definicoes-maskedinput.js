function tipo_telefone(numero){
    var num = numero.replace(/[^\d]+/g,'');
    if(num.length>10){
        $(function(){
            $(".telefone").mask("(99) 9 9999-9999", {autoclear: false});
        });
    }else{
        $(function(){
            $(".telefone").mask("(99) 9999-9999?9", {autoclear: false});
        });
    }
}

$(function(){
    $("#data_nasc").mask("99/99/9999", {autoclear: false, placeholder:"dd/mm/aaaa"});
    $(".cpf").mask("999.999.999-99", {autoclear: false});
    $(".cpf-clear").mask("999.999.999-99");
    $("#cep").mask("99.999-999", {autoclear: false});
    $(".telefone").mask("(99) 9999-9999?9", {autoclear: false});
});