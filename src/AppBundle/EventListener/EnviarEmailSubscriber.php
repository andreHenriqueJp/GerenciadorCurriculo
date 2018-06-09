<?php

namespace AppBundle\EventListener;

use AppBundle\Event\InscricaoEvent;
use Infrastructure\Service\EmailService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EnviarEmailSubscriber implements EventSubscriberInterface
{
    /**
     * @var EmailService
     */
    private $emailService;

    /**
     * EnviarEmailSubscriber constructor.
     * @param EmailService $emailService
     */
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
            InscricaoEvent::INSCRICAO => [['onInscricao', 200]]
        ];
    }

    public function onInscricao(InscricaoEvent $inscricaoEvent)
    {
        $inscricao = $inscricaoEvent->getInscricao();
        $this->emailService->enviarNotificacaoInscricao($inscricao);
    }
}