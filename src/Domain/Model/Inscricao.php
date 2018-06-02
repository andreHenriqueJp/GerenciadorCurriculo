<?php
/**
 * Created by PhpStorm.
 * User: Lab05usuario33
 * Date: 02/06/2018
 * Time: 14:16
 */

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
}