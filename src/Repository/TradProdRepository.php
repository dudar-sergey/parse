<?php

namespace App\Repository;

use App\Entity\TradProd;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TradProd|null find($id, $lockMode = null, $lockVersion = null)
 * @method TradProd|null findOneBy(array $criteria, array $orderBy = null)
 * @method TradProd[]    findAll()
 * @method TradProd[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TradProdRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TradProd::class);
    }

    // /**
    //  * @return TradProd[] Returns an array of TradProd objects
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
    public function findOneBySomeField($value): ?TradProd
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
