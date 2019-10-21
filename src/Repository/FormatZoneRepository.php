<?php

namespace App\Repository;

use App\Entity\FormatZone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method FormatZone|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormatZone|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormatZone[]    findAll()
 * @method FormatZone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormatZoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormatZone::class);
    }

    // /**
    //  * @return FormatZone[] Returns an array of FormatZone objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FormatZone
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
