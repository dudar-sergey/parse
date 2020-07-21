<?php

namespace App\Repository;

use App\Entity\ExProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExProduct[]    findAll()
 * @method ExProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExProduct::class);
    }

    // /**
    //  * @return ExProduct[] Returns an array of ExProduct objects
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
    public function findOneBySomeField($value): ?ExProduct
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
