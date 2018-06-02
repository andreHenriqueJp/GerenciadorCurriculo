<?php
/**
 * Created by PhpStorm.
 * User: Lab05usuario33
 * Date: 19/05/2018
 * Time: 14:23
 */

namespace Domain\Service;


use Domain\Model\Oportunidade;

interface OportunidadeServiceInterface

{
    /**
     * @param Oportunidade $oportunidade
     * @return void
     */
    public function salvar(Oportunidade $oportunidade);

    /**
     * @return array
     */
    public function listarTudo();
}
