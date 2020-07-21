<?php

namespace App\Repository;

use App\Entity\NameExGr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NameExGr|null find($id, $lockMode = null, $lockVersion = null)
 * @method NameExGr|null findOneBy(array $criteria, array $orderBy = null)
 * @method NameExGr[]    findAll()
 * @method NameExGr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NameExGrRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NameExGr::class);
    }

    // /**
    //  * @return NameExGr[] Returns an array of NameExGr objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NameExGr
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
