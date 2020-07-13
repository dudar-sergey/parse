<?php

namespace App\Repository;

use App\Entity\JcbPr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JcbPr|null find($id, $lockMode = null, $lockVersion = null)
 * @method JcbPr|null findOneBy(array $criteria, array $orderBy = null)
 * @method JcbPr[]    findAll()
 * @method JcbPr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JcbPrRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JcbPr::class);
    }

    // /**
    //  * @return JcbPr[] Returns an array of JcbPr objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JcbPr
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
