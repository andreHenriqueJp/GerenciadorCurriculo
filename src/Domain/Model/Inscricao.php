<?php

namespace Domain\Model;

class Inscricao
{
    /**
     * @var int
     */
    private $idInscricao;

    /**
     * @var Candidato
     */
    private $candidato;

    /**
     * @var Oportunidade
     */
    private $oportunidade;

    /**
     * @var string
     */
    private $codigoConfirmacao;

    /**
     * @var boolean
     */
    private $ativa;

    public function __construct(
        Candidato $candidato,
        Oportunidade $oportunidade
    ) {
        $this->candidato = $candidato;
        $this->oportunidade = $oportunidade;
        $this->ativa = false;
    }

    /**
     * @return int
     */
    public function getIdInscricao()
    {
        return $this->idInscricao;
    }

    /**
     * @return Candidato
     */
    public function getCandidato()
    {
        return $this->candidato;
    }

    /**
     * @return Oportunidade
     */
    public function getOportunidade()
    {
        return $this->oportunidade;
    }

    /**
     * @return string
     */
    public function getCodigoConfirmacao()
    {
        return $this->codigoConfirmacao;
    }

    public function gerarCodigoConfirmacao()
    {
        $this->codigoConfirmacao = substr(uniqid(rand(), true), -6, 6);
    }
}
