<?php

namespace App\Repository;

use App\Entity\Deportistas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Deportistas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Deportistas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Deportistas[]    findAll()
 * @method Deportistas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeportistasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Deportistas::class);
    }

    // /**
    //  * @return Deportistas[] Returns an array of Deportistas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Deportistas
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
