<?php

namespace Domain\Repository;

use Domain\Model\Inscricao;

interface InscricaoRepositoryInterface
{
    /**
     * @param Inscricao $inscricao
     * @return void
     */
    public function salvar(Inscricao $inscricao);

    /**
     * @param Inscricao $inscricao
     * @return mixed
     */
    public function buscarUmPorCpfOportunidade(Inscricao $inscricao);
}