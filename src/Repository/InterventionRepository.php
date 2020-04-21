<?php

namespace App\Repository;

use App\Entity\Intervention;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Intervention|null find($id, $lockMode = null, $lockVersion = null)
 * @method Intervention|null findOneBy(array $criteria, array $orderBy = null)
 * @method Intervention[]    findAll()
 * @method Intervention[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InterventionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Intervention::class);
    }

    public function filter($id)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT * 
            FROM tbl_intervention i
            WHERE i.status_id = :id
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);

        
        return $stmt->fetchAll();
    }

    public function nbr(): array
    {
        $rawSql = "
        
SELECT count(*) as nb from tbl_intervention i where i.status_id = 1
        ";

        $stmt = $this->getEntityManager()->getConnection()->prepare($rawSql);
        $stmt->execute([]);
    
        return $stmt->fetchAll();

    }
   
    // public function filter($id)
    // {
    //     return $this->createQueryBuilder('i')
    //         ->andWhere('i.exampleField = :id')
    //         ->setParameter('id', $id)
    //         // ->orderBy('i.id', 'ASC')
    //         ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }
    

    // /**
    //  * @return Intervention[] Returns an array of Intervention objects
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
    public function findOneBySomeField($value): ?Intervention
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
