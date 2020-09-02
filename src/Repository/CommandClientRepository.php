<?php

namespace App\Repository;

use App\Entity\CommandClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CommandClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommandClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommandClient[]    findAll()
 * @method CommandClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommandClient::class);
    }

    public function getTotalPrice($year, $month)
    {
        $emConfig = $this->getEntityManager()->getConfiguration();
        $emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');
        $emConfig->addCustomDatetimeFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');

        return $this->createQueryBuilder('c')
            ->where('YEAR(c.createdAt) = :year')
            ->andWhere('MONTH(c.createdAt) = :month')
            ->setParameter('year', $year)
            ->setParameter('month', $month)
            ->select('SUM(c.totalPrice)')
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }
}
