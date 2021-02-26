<?php

namespace App\Repository;

use App\Entity\Competiciones;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityRepository;

/**
 * @method Competiciones|null find($id, $lockMode = null, $lockVersion = null)
 * @method Competiciones|null findOneBy(array $criteria, array $orderBy = null)
 * @method Competiciones[]    findAll()
 * @method Competiciones[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompeticionesRepository extends EntityRepository
{
    public function findAllActive(){
        return $this->getEntityManager()->createQuery(
                "SELECT o FROM App:Competiciones ORDER BY o.date ASC"
                )->getResult();
    }

    /*public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Competiciones::class);
    }
*/
    // /**
    //  * @return Competiciones[] Returns an array of Competiciones objects
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
    public function findOneBySomeField($value): ?Competiciones
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
