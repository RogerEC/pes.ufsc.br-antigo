<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Projeto Educação Solidária - Cursinho PES</title>
        <meta name="keywords" content="Curso pré-vestibular; UFSC; Cursinho PES; Projeto Educação Solidária; Araranguá">
        <meta name="description" content="Curso pré-vestibular com foco no ENEM e Vestibular UFSC destinado a estudantes da rede pública de ensino da cidade de Araranguá, SC.">
        <meta name="robots" content="index, follow">
        <?php $path = $_SERVER['DOCUMENT_ROOT']; require_once($path."/scripts/php/componentes/links-head.php"); //Links padrões do head?>
    </head>

    <body>
        
        <?php require_once($path."/scripts/php/componentes/barra-navegacao.php"); //Barra de Navegação?>

        <main class="h-100"><!--Conteúdo da página-->
            <div class="banner">
                <div class="bg-color-banner">
                    <div class="text-center w-100 pb-3" style="padding-top: 150px;">
                        <b>PROJETO EDUCAÇÃO SOLIDÁRIA</b>
                    </div>
                    <div class="text-center w-100 pb-5">
                        <h4>Curso pré-vestibular social da UFSC Campus Araranguá.</h4>
                    </div>
                    <!--<div class="w-100 text-center mb-0">
                        <button class="btn btn-verde mb-3" id="GrupoEstudos"><b>Inscrição no Grupo de Estudos - 2ª Chamada</b></button>
                    </div>-->
                    <div class="w-100 text-center mb-5">
                        <button class="btn btn-verde mb-3" id="PSAlunos"><b>Processo Seletivo de<br>Alunos (Aberto)</b></button>
                        <button class="btn btn-verde mb-3" id="PSGestao"><b>Processo Seletivo de<br>Gestores (Aberto)</b></button>
                        <button class="btn btn-verde mb-3" id="PSProfs"><b>Processo Seletivo de<br>Professores (Aberto)</b></button>
                    </div> 
                </div>
            </div>
        </main><!--/Conteúdo da página-->

        <?php require_once($path."/scripts/php/componentes/rodape.php"); //Rodapé?>
        
        <!--Javascript-->
        <script src="/scripts/js/libs/jquery.min.js"></script>
        <script src="/scripts/js/libs/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#PSAlunos").on("click", function(){
                    $(location).attr("href", "/processo-seletivo/alunos");
                });
                $("#PSGestao").on("click", function(){
                    $(location).attr("href", "/processo-seletivo/gestao");
                });
                $("#PSProfs").on("click", function(){
                    $(location).attr("href", "/processo-seletivo/professores");
                });
                $("#GrupoEstudos").on("click", function(){
                    $(location).attr("href", "/grupo-de-estudos");
                });
            });
        </script>
    </body>
</html>