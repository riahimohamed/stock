<?php

namespace App\Repository;

use App\Entity\AdjustStocks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdjustStocks|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdjustStocks|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdjustStocks[]    findAll()
 * @method AdjustStocks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdjustStocksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdjustStocks::class);
    }

    // /**
    //  * @return AdjustStocks[] Returns an array of AdjustStocks objects
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
    public function findOneBySomeField($value): ?AdjustStocks
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
