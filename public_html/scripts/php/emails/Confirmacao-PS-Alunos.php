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
    $mail->addReplyTo('processoseletivo@pes.ufsc.br', 'Processo Seletivo - Cursinho PES');
    //Mensagem
    /*$mensagem = "<p>Olá $nome,</p>
    <p>Sua inscrição no Processo Seletivo de Alunos 2020 foi realizada com sucesso!</p>
    <p>A próxima etapa do processo seletivo será a <b>PROVA TEÓRICA</b> realizada <b>no dia 25/03/2020</b>, nas dependências do bloco A do prédio da UFSC/Unisul situado no endereço: Rodovia Governador Jorge Lacerda (SC 449, km 34,4), Nº 3201, bairro Jardim das Avenidas, Araranguá – Santa Catarina. CEP: 88906-072.</p>
    <p>No dia da prova teórica os candidatos terão acesso a sala de prova entre às 18h até às 18h45min. <b>Candidatos que chegarem após às 18h45min não poderão mais entrar na sala.</b></p>
    <p>A prova começará pontualmente às 19h e terá duração máxima de 3 horas. Os candidatos que terminarem antes poderão sair apenas após passado 1 hora de prova.</p>
    <p>Para realizar a prova, <b>é obrigatório o candidato portar:</b></p>
    <ol>
        <li>Caneta esferográfica de tinta preta (preferencialmente) ou azul fabricada em material transparente.</li>
        <li>O original do documento de identificação com foto.</li>
        <li>Os 15 reais da taxa de inscrição. *</li>
    </ol>
    <small>*Candidatos que não tenham condições de pagar a taxa de inscrição poderão fazer a prova assinando uma Declaração de Carência. Basta avisar a equipe do Cursinho PES no dia da aplicação.</small>
    <br>
    <p>Maiores detalhes sobre a prova podem ser encontrados acessando o <a href='https://pes.ufsc.br/processo-seletivo/alunos/2020/Edital_N03PES2020.pdf'>edital do processo seletivo.</a></p>
    <p>Quaisquer dúvidas adicionais podem ser encaminhadas para o e-mail processoseletivo@pes.ufsc.br.</p>
    <p>Tenha uma ótima semana e até breve!</p>
    Cursinho PES.<br/>
    <small>Mensagem enviada automaticamente pelo sistema.</small>";*/
    $mensagem = "<p>Olá $nome,</p>
    <p>Sua inscrição no Processo Seletivo de Alunos 2020 foi realizada com sucesso!</p>
    <p>No momento, devido a pandemia de Covid-19 as próximas etapas do Processo Seletivo de Alunos que seriam realizadas presencialmente encontram-se suspensas.</p>
    <p>Assim que as atividades na UFSC voltarem a normalidade, novas datas serão divulgadas pelo e-mail, no nosso <a href='https://pes.ufsc.br/processo-seletivo/alunos/'>site</a> e pelas nossas redes sociais oficiais (<a href='https://www.facebook.com/PES.UFSC/'>Facebook</a> e <a href='https://www.instagram.com/cursinhopes/'>Instagram</a>).</p>
    <p>Maiores detalhes sobre a prova podem ser encontrados acessando o <a href='https://pes.ufsc.br/processo-seletivo/alunos/2020/Edital_N03PES2020.pdf'>edital do processo seletivo.</a></p>
    <p>Quaisquer dúvidas adicionais podem ser encaminhadas para o e-mail processoseletivo@pes.ufsc.br.</p>
    <p>Desde já, agradecemos a compreensão de todos e esperamos voltar a entrar em contato o mais breve possível.</p>
    Cursinho PES.<br/>
    <small>Mensagem enviada automaticamente pelo sistema.</small>";
    $mail->isHTML(true);
    $mail->Subject = "Confirmação de inscrição - Processo Seletivo de Alunos 2020 - Cursinho PES";
    $mail->Body    = $mensagem;
    $mail->AltBody = strip_tags($mensagem);

    $mail->send();
} catch (Exception $e) {
    echo "ERRO_EMAIL";
}
?>