<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require($path."/scripts/php/PHPMailer/src/Exception.php");
require($path."/scripts/php/PHPMailer/src/PHPMailer.php");
require($path."/scripts/php/PHPMailer/src/SMTP.php");
require($path."/../private/scripts/php/senhas/Email-SISTEMA.php");
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
    <p>Seu cadastro no Grupo de Estudos do Cursinho PES foi realizada com sucesso!</p>
    <p>Em breve você receberá um e-mail da nossa equipe informando os dados de acesso para nossa sala virtual no Google Sala de Aula.</p>
    <p>Caso você tenha qualquer dúvida sobre o Grupo de Estudos pode entrar em contato pelo e-mail grupodeestudos@pes.ufsc.br ou através de nossas redes sociais no <a href='https://www.facebook.com/PES.UFSC/'>Facebook</a> ou <a href='https://www.instagram.com/cursinhopes/'>Instagram</a>.</p>
    <p>ATENÇÃO: Se nossa equipe não entrar em contato no prazo de até 24 horas após a confirmação de cadastro, entre em contato pelo e-mail: grupodeestudos@pes.ufsc.br.</p>
    <br>
    Cursinho PES.<br/>
    <small>Mensagem enviada automaticamente pelo sistema.</small>";
    $mail->isHTML(true);
    $mail->Subject = "Confirmação de Cadastro - Grupo de Estudos Cursinho PES";
    $mail->Body    = $mensagem;
    $mail->AltBody = strip_tags($mensagem);

    $mail->send();
} catch (Exception $e) {
    echo "ERRO_EMAIL";
}
?>