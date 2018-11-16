<?php

namespace App\Repository;

use App\Entity\TheaterInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TheaterInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method TheaterInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method TheaterInfo[]    findAll()
 * @method TheaterInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TheaterInfoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TheaterInfo::class);
    }

    // /**
    //  * @return TheaterInfo[] Returns an array of TheaterInfo objects
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
    public function findOneBySomeField($value): ?TheaterInfo
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
