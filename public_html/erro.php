<?php
    if(!isset($erro)){
        if(isset($_GET["erro"])){
            $erro = $_GET["erro"];
        }else{
            $erro = "";
        }
    }
    
    $descricao = "";
    switch($erro){
        case 400:
            $nome = "Requisição Inválida";
            break;
        case 401:
            $nome = "Não autorizado";
            $descricao = "Autenticação necessária.";
            break;
        case 402:
            $nome = "Pagamento necessário";
            break;
        case 403:
            $nome = "Acesso negado";
            $descricao = "Você não tem permissão para acessar essa página.";
            break;
        case 404:
            $nome = "Página não encontrada";
            $descricao = "A página solicitada não foi encontrada no servidor.";
            break;
        case 405:
            $nome = "Método não permitido";
            break;
        case 406:
            $nome = "Não aceito";
            break;
        case 407:
            $nome = "Autenticação de Proxy Necessária";
            break;
        case 408:
            $nome = "Tempo de solicitação esgotado";
            break;
        case 409:
            $nome = "Conflito";
            break;
        case 410:
            $nome = "Perdido";
            break;
        case 411:
            $nome = "Duração necessária";
            break;
        case 412:
            $nome = "Falha de pré-condição";
            break;
        case 413:
            $nome = "Solicitação da entidade muito extensa";
            break;
        case 414:
            $nome = "Solicitação de URL muito Longa";
            break;
        case 415:
            $nome = "Tipo de mídia não suportado";
            break;
        case 416:
            $nome = "Solicitação de faixa não satisfatória";
            break;
        case 417:
            $nome = "Falha na expectativa";
            break;
        case 500:
            $nome = "Erro interno do servidor";
            break;
        case 501:
            $nome = "Não implementado";
            break;
        case 502:
            $nome = "Porta de entrada ruim";
            break;
        case 503:
            $nome = "Serviço indisponível";
            break;
        case 504:
            $nome = "Tempo limite da Porta de Entrada";
            break;
        case 505:
            $nome = "Versão HTTP não suportada";
            break;
        default:
            $nome = "Erro desconhecido";
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <?php $path = $_SERVER['DOCUMENT_ROOT']; require_once($path."/scripts/php/componentes/links-head.php");?>
        <title>Erro <?php echo $erro; ?></title>
    </head>

    <body>
        <!--Barra de navegação-->
        <?php require_once($path."/scripts/php/componentes/barra-navegacao.php");?>
        <!--/Barra de navegação-->

        <main class="container"><!--Conteúdo da página-->
            <h1>Erro <?php echo $erro; ?> - <?php echo $nome; ?></h1>
            <?php
                if($descricao!=""){
                    echo "<p>$descricao</p>";
                }
            ?>
            <p><b><a href="/">Clique aqui</a></b> para voltar a página inicial.</p>
        </main><!--/Conteúdo da página-->

        <!--Rodapé-->
        <?php require_once($path."/scripts/php/componentes/rodape.php");?>
        <!--/Rodapé-->

        <!--Javascript-->
        <script src="/scripts/js/libs/jquery.min.js"></script>
        <script src="/scripts/js/libs/bootstrap.min.js"></script>
    </body>
</html>

