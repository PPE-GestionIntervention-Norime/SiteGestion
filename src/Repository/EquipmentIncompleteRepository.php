<?php

namespace App\Repository;

use App\Entity\EquipmentIncomplete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EquipmentIncomplete|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipmentIncomplete|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipmentIncomplete[]    findAll()
 * @method EquipmentIncomplete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipmentIncompleteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquipmentIncomplete::class);
    }

    public function findAll()
    {
        $builder = $this->createQueryBuilder('a');
        $builder->orderBy('a.name','ASC');
        return $builder->getQuery()->getResult();
    }

    // /**
    //  * @return EquipmentIncomplete[] Returns an array of EquipmentIncomplete objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EquipmentIncomplete
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
