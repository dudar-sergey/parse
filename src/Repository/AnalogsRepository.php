<?php

namespace App\Repository;

use App\Entity\Analogs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Analogs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Analogs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Analogs[]    findAll()
 * @method Analogs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnalogsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Analogs::class);
    }

    // /**
    //  * @return Analogs[] Returns an array of Analogs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Analogs
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
