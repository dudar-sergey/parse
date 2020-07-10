<?php

namespace App\Repository;

use App\Entity\ArtDet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArtDet|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArtDet|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArtDet[]    findAll()
 * @method ArtDet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtDetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArtDet::class);
    }

    // /**
    //  * @return ArtDet[] Returns an array of ArtDet objects
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
    public function findOneBySomeField($value): ?ArtDet
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
