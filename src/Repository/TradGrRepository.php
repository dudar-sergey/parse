<?php

namespace App\Repository;

use App\Entity\TradGr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TradGr|null find($id, $lockMode = null, $lockVersion = null)
 * @method TradGr|null findOneBy(array $criteria, array $orderBy = null)
 * @method TradGr[]    findAll()
 * @method TradGr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TradGrRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TradGr::class);
    }

    // /**
    //  * @return TradGr[] Returns an array of TradGr objects
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
    public function findOneBySomeField($value): ?TradGr
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
