<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Informação dos candidatos</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="robots" content="index, follow">
        <?php $path = $_SERVER['DOCUMENT_ROOT']; require_once($path."/scripts/php/componentes/links-head.php"); //Links padrões do head?>
    </head>

    <body>

        <main class="pt-2"><!--Conteúdo da página-->
            <div class="text-center">
                <button class="btn btn-verde" value="Teste" id="Teste">Professores</button>
            </div>
        </main><!--/Conteúdo da página-->
        
        <!--Javascript-->
        <script src="/scripts/js/libs/jquery-3.4.1.min.js"></script>
        <script src="/scripts/js/libs/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#Teste").on("click", function(){
                    console.log($(this).val());
                });
            });
        </script>
    </body>
</html>