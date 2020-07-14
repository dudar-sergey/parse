<?php

namespace App\Repository;

use App\Entity\JcbGr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JcbGr|null find($id, $lockMode = null, $lockVersion = null)
 * @method JcbGr|null findOneBy(array $criteria, array $orderBy = null)
 * @method JcbGr[]    findAll()
 * @method JcbGr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JcbGrRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JcbGr::class);
    }

    // /**
    //  * @return JcbGr[] Returns an array of JcbGr objects
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
    public function findOneBySomeField($value): ?JcbGr
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
