<?php

namespace App\Repository;

use App\Entity\Droid;
use App\Entity\Starship;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use http\QueryString;

/**
 * @extends ServiceEntityRepository<Droid>
 */
class DroidRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Droid::class);
    }

    public function getDroidsByStarship(Starship $starship): array
    {
        return $this->createQueryBuilder('d')
            ->join('d.starships', 's')
            ->where('s.id = :straship')
            ->setParameter('straship', $starship)
            ->getQuery()
            ->getResult();
    }



    //    /**
    //     * @return Droid[] Returns an array of Droid objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('d.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Droid
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
