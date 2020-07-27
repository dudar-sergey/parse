<?php

namespace App\Repository;

use App\Entity\FestAnalogs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FestAnalogs|null find($id, $lockMode = null, $lockVersion = null)
 * @method FestAnalogs|null findOneBy(array $criteria, array $orderBy = null)
 * @method FestAnalogs[]    findAll()
 * @method FestAnalogs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FestAnalogsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FestAnalogs::class);
    }

    // /**
    //  * @return FestAnalogs[] Returns an array of FestAnalogs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FestAnalogs
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
