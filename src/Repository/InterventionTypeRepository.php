<?php

namespace App\Repository;

use App\Entity\TypeIntervention;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method InterventionType|null find($id, $lockMode = null, $lockVersion = null)
 * @method InterventionType|null findOneBy(array $criteria, array $orderBy = null)
 * @method InterventionType[]    findAll()
 * @method InterventionType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InterventionTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeIntervention::class);
    }

    public function findAll()
    {
        $builder = $this->createQueryBuilder('a');
        $builder->orderBy('a.name','ASC');
        return $builder->getQuery()->getResult();
    }

    // /**
    //  * @return InterventionType[] Returns an array of InterventionType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InterventionType
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
