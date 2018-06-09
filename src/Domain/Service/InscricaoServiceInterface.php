<?php
/**
 * Created by PhpStorm.
 * User: Lab05usuario33
 * Date: 09/06/2018
 * Time: 11:44
 */

namespace Domain\Service;


use Presentation\DataTransferObject\InscricaoDTO;

Interface InscricaoServiceInterface
{
    /**
     * @param InscricaoDTO $inscricaoDTO
     * @return int
     */
    public function inscrever (InscricaoDTO $inscricaoDTO);
}