<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Processos Seletivos - Cursinho PES</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="robots" content="index, follow">
        <?php $path = $_SERVER['DOCUMENT_ROOT']; require_once($path."/scripts/php/componentes/links-head.php"); //Links padrões do head?>
    </head>

    <body>
        
        <?php require_once($path."/scripts/php/componentes/barra-navegacao.php"); //Barra de Navegação?>

        <main><!--Conteúdo da página-->
            <div class="container">
                <div class="text-center w-100 pt-5 pb-5">
                    <h1>Processos Seletivos Cursinho PES</h1>  
                </div>
                <p class="mb-0">Selecione abaixo em qual processo seletivo você gostaria de participar ou ter mais informações.</p>
                <p>Lembramos que não é necessário ter ligação com a UFSC para ser voluntário do projeto, seja como professor ou como gestor.</p>
                <p><b>Todos os processos seletivos se encontram abertos por tempo indeterminado e as etapas presenciais do processos seletivos estão suspensas devido a pandemia de Covid-19.</b></p>
                <p><a href="/processo-seletivo/alunos">Alunos</a></p>
                <p><a href="/processo-seletivo/gestao">Gestores</a></p>
                <p><a href="/processo-seletivo/professores">Professores</a></p>
            </div>
        </main><!--/Conteúdo da página-->

        <?php require_once($path."/scripts/php/componentes/rodape.php"); //Rodapé?>
        
        <!--Javascript-->
        <script src="/scripts/js/libs/jquery.min.js"></script>
        <script src="/scripts/js/libs/bootstrap.min.js"></script>
    </body>
</html>