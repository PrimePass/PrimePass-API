<?php

namespace App\Repository;

use App\Entity\MovieInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MovieInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method MovieInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method MovieInfo[]    findAll()
 * @method MovieInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieInfoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MovieInfo::class);
    }

    // /**
    //  * @return MovieInfo[] Returns an array of MovieInfo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MovieInfo
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
