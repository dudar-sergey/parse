<?php

namespace App\Repository;

use App\Entity\FestProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FestProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method FestProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method FestProduct[]    findAll()
 * @method FestProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FestProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FestProduct::class);
    }

    // /**
    //  * @return FestProduct[] Returns an array of FestProduct objects
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
    public function findOneBySomeField($value): ?FestProduct
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
