<?php

namespace App\Repository;

use App\Entity\TecAnalog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TecAnalog|null find($id, $lockMode = null, $lockVersion = null)
 * @method TecAnalog|null findOneBy(array $criteria, array $orderBy = null)
 * @method TecAnalog[]    findAll()
 * @method TecAnalog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TecAnalogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TecAnalog::class);
    }

    // /**
    //  * @return TecAnalog[] Returns an array of TecAnalog objects
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
    public function findOneBySomeField($value): ?TecAnalog
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
