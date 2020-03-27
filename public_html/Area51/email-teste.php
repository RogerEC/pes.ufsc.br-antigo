<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$path = $_SERVER['DOCUMENT_ROOT'];
require($path."/scripts/php/PHPMailer/src/Exception.php");
require($path."/scripts/php/PHPMailer/src/PHPMailer.php");
require($path."/scripts/php/PHPMailer/src/SMTP.php");

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false;
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->True;
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
    $mail->addReplyTo('processoseletivo@pes.ufsc.br', 'Processo Seletivo - Cursinho PES');
    //Mensagem
    $mail->isHTML(true);
    $mail->Subject = "Confirmação de inscrição - Processo Seletivo $nomePS - Cursinho PES";
    $mail->Body    = "Olá $nome,<br>Sua inscrição no Processo Seletivo de $nomePS foi realizada com sucesso!<br>Informações sobre os próximos passos do processo seletivo serão enviadas por e-mail no dia 14/03/2020.<br>Tenha uma ótima semana e até breve!<br><br>Cursinho PES.<br><small>Mensagem enviada automaticamente pelo sistema.</small>";
    $mail->AltBody = "Olá $nome, Sua inscrição no Processo Seletivo de $nomePS foi realizada com sucesso! Informações sobre os próximos passos do processo seletivo serão enviadas por e-mail no dia 14/03/2020. Tenha uma ótima semana e até breve! Cursinho PES. Mensagem enviada automaticamente pelo sistema.";

    $mail->send();
} catch (Exception $e) {
    echo "ERRO_EMAIL";
}
?>