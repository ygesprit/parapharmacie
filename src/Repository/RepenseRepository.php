<?php

namespace App\Repository;

use App\Entity\Repense;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Repense|null find($id, $lockMode = null, $lockVersion = null)
 * @method Repense|null findOneBy(array $criteria, array $orderBy = null)
 * @method Repense[]    findAll()
 * @method Repense[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepenseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Repense::class);
    }

    // /**
    //  * @return Repense[] Returns an array of Repense objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Repense
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
