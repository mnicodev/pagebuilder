<?php

namespace App\Repository;

use App\Entity\ContentData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ContentData|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentData|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentData[]    findAll()
 * @method ContentData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentData::class);
    }

    // /**
    //  * @return ContentData[] Returns an array of ContentData objects
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
    public function findOneBySomeField($value): ?ContentData
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
