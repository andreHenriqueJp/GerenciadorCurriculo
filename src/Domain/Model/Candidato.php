<?php
/**
 * Created by PhpStorm.
 * User: Lab05usuario33
 * Date: 02/06/2018
 * Time: 11:34
 */

namespace Domain\Model;


use Doctrine\Common\Collections\Collection;

class Candidato
{
    /**
     * @var int
     */
    private $idCandidato;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $telefone;


    /**
     * @var string
     */
    private $curriculo;

    /**
     * @var string
     */
    private $cpf;

    /**
     * @var Collection
     */
    private $habilidadesTecnicas;

    /**
     * @var Collection
     */
    private $experienciasProfissionais;


    /**
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }




}