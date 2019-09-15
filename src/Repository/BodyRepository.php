<?php

namespace App\Repository;

use App\Entity\Body;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Body|null find($id, $lockMode = null, $lockVersion = null)
 * @method Body|null findOneBy(array $criteria, array $orderBy = null)
 * @method Body[]    findAll()
 * @method Body[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BodyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Body::class);
    }

    // /**
    //  * @return Body[] Returns an array of Body objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Body
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
