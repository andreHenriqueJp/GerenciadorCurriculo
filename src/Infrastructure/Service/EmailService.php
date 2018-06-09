<?php

namespace Infrastructure\Service;

use Domain\Model\Inscricao;

class EmailService
{
    public function enviarNotificacaoInscricao(Inscricao $inscricao)
    {
        $candidato = $inscricao->getCandidato();
        $destinatario = $candidato->getEmail();
        $nomeDestinatario = $candidato->getNome();
        $assunto = "Inscrição de Emprego - Código de Confirmação";
        $corpoDoEmail = "Olá, " . $nomeDestinatario . "\n" .
            "Seu código de confirmação de inscrição é: " . $inscricao->getCodigoConfirmacao();

        $this->enviarNotificacao($destinatario, $nomeDestinatario, $assunto, $corpoDoEmail);
    }

    public function enviarNotificacao(
        string $destinatario,
        string $nomeDestinatario,
        string $assunto,
        string $corpoDoEmail
    ) {
        $transport = (new
        \Swift_SmtpTransport('mail.smtp2go.com', 2525))
            ->setUsername('martin.pfeifer@publicsoft.com.br')
            ->setPassword('UU2aCnYy0FYm');

        $mailer = new \Swift_Mailer($transport);

        //criaçao da mensagem
        $message = new \Swift_Message($assunto);

        $message->setFrom(["suporte.inscricao@hotmail.com" => "Suporte - Inscrição de Emprego"])
            ->setTo([$destinatario => $nomeDestinatario])
            ->setBody($corpoDoEmail);

        //Dispara o email
        $mailer->send($message);
    }
}
