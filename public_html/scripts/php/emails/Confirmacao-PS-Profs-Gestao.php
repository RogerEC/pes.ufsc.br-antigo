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
    /*$mensagem = "<p>Olá $nome,</p>
    <p>Sua inscrição no Processo Seletivo $nomePS foi realizada com sucesso!</p>
    <p>Informações sobre os próximos passos do processo seletivo serão enviadas por e-mail no dia 17/03/2020.</p>
    <p>Tenha uma ótima semana e até breve!</p>
    <br>Cursinho PES.<br>
    <small>Mensagem enviada automaticamente pelo sistema.</small>";*/
    $mensagem = "<p>Olá $nome,</p>
    <p>Sua inscrição no Processo Seletivo $nomePS foi realizada com sucesso!</p>
    <p>No momento, devido a pandemia de Covid-19 as próximas etapas do Processo Seletivo $nomePS que seriam realizadas presencialmente encontram-se suspensas.</p>
    <p>Assim que as atividades na UFSC voltarem a normalidade, novas datas serão divulgadas pelo e-mail, no nosso <a href='https://pes.ufsc.br/processo-seletivo/'>site</a> e pelas nossas redes sociais oficiais (<a href='https://www.facebook.com/PES.UFSC/'>Facebook</a> e <a href='https://www.instagram.com/cursinhopes/'>Instagram</a>).</p>
    <p>Quaisquer dúvidas adicionais podem ser encaminhadas para o e-mail processoseletivo@pes.ufsc.br.</p>
    <p>Desde já, agradecemos a compreensão de todos e esperamos voltar a entrar em contato o mais breve possível.</p>
    <br>Cursinho PES.<br>
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