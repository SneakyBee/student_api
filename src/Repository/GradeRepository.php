<?php

namespace App\Repository;

use App\Entity\Grade;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Grade|null find($id, $lockMode = null, $lockVersion = null)
 * @method Grade|null findOneBy(array $criteria, array $orderBy = null)
 * @method Grade[]    findAll()
 * @method Grade[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GradeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Grade::class);
    }

    public function getGlobalAverage(){
        $sumAndCount = $this->createQueryBuilder('g')
            ->select('SUM(g.value) as total, COUNT(g.value) as count')
            ->getQuery()
            ->getSingleResult()
        ;
        $average = $sumAndCount["total"] / $sumAndCount["count"];

        return $average;
    }

    public function getStudentAverage($id){
        $studentGrades = $this->createQueryBuilder('g')
            ->select('SUM(g.value) as total, COUNT(g.value) as count')
            ->where('g.student = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getSingleResult()
        ;
        $average = $studentGrades["total"] / $studentGrades["count"];

        return $average;
    }

    // /**
    //  * @return Grade[] Returns an array of Grade objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Grade
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
