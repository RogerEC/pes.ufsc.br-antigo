<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require($path."/scripts/php/PHPMailer/src/Exception.php");
require($path."/scripts/php/PHPMailer/src/PHPMailer.php");
require($path."/scripts/php/PHPMailer/src/SMTP.php");
require($path."/../private/senhas/Email-SISTEMA.php");
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 4;
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->Host       = $host_SMTP;
    $mail->SMTPAuth   = $autenticacao_SMTP;
    $mail->SMTPSecure = $seguranca_SMTP;
    $mail->Username   = $endereco_email;
    $mail->Password   = $senha_email;
    $mail->FromName = $nome_email;
    $mail->From = $endereco_email;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $porta_SMTP;
    //Recipients
    $mail->setFrom($endereco_email, $nome_email);
    $mail->addAddress($email, $nome." ".$sobrenome);
    $mail->addReplyTo('grupodeestudos@pes.ufsc.br', 'Grupo de Estudos Cursinho PES');
    //Mensagem
    $mensagem = "<p>Olá $nome,</p>
    <p>Sua inscrição no Grupo de Estudos do Cursinho PES foi realizada com sucesso!</p>
    <p>A partir do dia 17 de maio de 2021 você receberá um e-mail da nossa equipe informando as instruções de acesso ao Grupo de Estudos.</p>
    <p>Caso você tenha qualquer dúvida sobre o Grupo de Estudos pode entrar em contato pelo e-mail <b>grupodeestudos@pes.ufsc.br</b> ou através de nossas redes sociais no <a href='https://www.facebook.com/cursinhopes/'>Facebook</a> ou <a href='https://www.instagram.com/cursinhopes/'>Instagram</a>.</p>
    <p>Nossas aulas serão gravadas e disponibilizadas no <a href='https://www.youtube.com/channel/UC6rD7xpvC-YvUtkrP6KhyNA'>canal do Cursinho PES</a> no YouTube. As atividades realizadas no ano passado já se encontram disponíveis lá no canal e até o mês de maio serão realizadas algumas lives explicando o funcionamento e apresentando o projeto, as quais serão divulgadas com antecedência nas nossas redes sociais.</p>
    <p><b>ATENÇÃO:</b> Se nossa equipe não entrar em contato por e-mail ou WhatsApp até o fim do <b>dia 19/05/2021</b> para passar as informações de acesso ao Grupo de Estudos, entre em contato pelo e-mail: <b>grupodeestudos@pes.ufsc.br.</b> para verificarmos o que aconteceu.</p>
    <br>
    <p>Tenha uma semana maravilhosa e até logo!</p>
    Cursinho PES.<br/>
    <small>Mensagem enviada automaticamente pelo sistema.</small>";
    $mail->isHTML(true);
    $mail->Subject = "Confirmação de Inscrição - Grupo de Estudos Cursinho PES 2021";
    $mail->Body    = $mensagem;
    $mail->AltBody = strip_tags($mensagem);

    $mail->send();
} catch (Exception $e) {
    echo "ERRO_EMAIL";
}
?>