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
    $mail->SMTPDebug = 0;
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
    $mail->addReplyTo('processoseletivo@pes.ufsc.br', 'Processo Seletivo - Cursinho PES');
    //Mensagem
    $mensagem = "<p>Olá $nome,</p>
    <p>Sua inscrição no Processo Seletivo $nomePS foi realizada com sucesso!</p>
    <p>Informações sobre os próximos passos do processo seletivo serão enviadas por e-mail no dia <b>26/07/2020.</b></p>
    <p>Caso você tenha qualquer dúvida sobre o processo seletivo pode entrar em contato pelo e-mail <b>processoseletivo@pes.ufsc.br</b> ou através de nossas redes sociais no <a href='https://www.facebook.com/cursinhopes/'>Facebook</a> ou <a href='https://www.instagram.com/cursinhopes/'>Instagram</a>.</p>
    <p><b>ATENÇÃO:</b> Se nossa equipe não entrar em contato por e-mail ou WhatsApp até o fim do <b>dia 27/07/2020</b>, entre em contato pelo e-mail: <b>processoseletivo@pes.ufsc.br.</b></p>
    <br>
    <p>Tenha uma semana maravilhosa e até logo!</p>
    Cursinho PES.<br/>
    <small>Mensagem enviada automaticamente pelo sistema.</small>";
    $mail->isHTML(true);
    $mail->Subject = "Confirmação de inscrição - Processo Seletivo $nomePS - Cursinho PES";
    $mail->Body    = $mensagem;
    $mail->AltBody = strip_tags($mensagem);

    $mail->send();
} catch (Exception $e) {
    echo "ERRO_EMAIL";
}
?>