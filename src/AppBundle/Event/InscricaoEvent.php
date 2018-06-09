<?php

namespace AppBundle\Event;

use Domain\Model\Inscricao;
use Symfony\Component\EventDispatcher\Event;

class InscricaoEvent extends Event
{
    /**
     * @Event("AppBundle\Event\InscricaoEvent")
     */
    const INSCRICAO = 'inscricao';

    /**
     * @var Inscricao
     */
    private $inscricao;

    /**
     * InscricaoEvent constructor.
     * @param Inscricao $inscricao
     */
    public function __construct(Inscricao $inscricao)
    {
        $this->inscricao = $inscricao;
    }

    /**
     * @return Inscricao
     */
    public function getInscricao()
    {
        return $this->inscricao;
    }
}