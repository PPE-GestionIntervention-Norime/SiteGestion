<?php

namespace App\Repository;

use App\Entity\TypeIntervention;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TypeIntervention|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeIntervention|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeIntervention[]    findAll()
 * @method TypeIntervention[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeInterventionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeIntervention::class);
    }

    // /**
    //  * @return TypeIntervention[] Returns an array of TypeIntervention objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeIntervention
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
