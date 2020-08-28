<?php

namespace App\Repository;

use App\Entity\CommandProvider;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CommandProvider|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommandProvider|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommandProvider[]    findAll()
 * @method CommandProvider[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandProviderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommandProvider::class);
    }

    // /**
    //  * @return CommandProvider[] Returns an array of CommandProvider objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommandProvider
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
