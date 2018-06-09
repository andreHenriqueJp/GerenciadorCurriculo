<?php

namespace Infrastructure\Persistence\Doctrine;


use Doctrine\ORM\EntityRepository;
use Domain\Model\Inscricao;
use Domain\Repository\InscricaoRepositoryInterface;

class InscricaoRepository extends EntityRepository implements InscricaoRepositoryInterface
{
    /**
     * @param Inscricao $inscricao
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function salvar(Inscricao $inscricao)
    {
        $this->getEntityManager()->persist($inscricao);
        $this->getEntityManager()->flush();
    }

    /**
     * @param Inscricao $inscricao
     * @return mixed
     */
    public function buscarUmPorCpfOportunidade(Inscricao $inscricao)
    {
        $entityManager = $this->getEntityManager();

        $dql = "
            SELECT inscricao
            FROM Domain\Model\Incricao inscricao
            JOIN incricao.oportunidade oportunidade
            JOIN inscricao.candidato candidato
            WHERE oportunidade.idOportunidade = :oportunidade AND candidato.cpf = :candidato_cpf
        ";

        $query = $entityManager->createQuery($dql)->setMaxResults(1);
        $query->setParameter('candidato_cpf', $inscricao->getCandidato()->getCpf());
        $query->setParameter('oportunidade', $inscricao->getOportunidade()->getIdOportunidade());

        return $query->getOneOrNullResult();
    }
}
