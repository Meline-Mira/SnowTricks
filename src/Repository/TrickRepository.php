<?php

namespace App\Repository;

use App\Entity\Trick;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Trick>
 *
 * @method Trick|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trick|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trick[]    findAll()
 * @method Trick[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrickRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trick::class);
    }

    public function findTricks($offset = 0): array
    {
        $qb = $this->createQueryBuilder('t')
            ->select('t', 'm')
            ->leftJoin('t.media', 'm')
            ->where("m.type = 'image'")
            ->orderBy('t.id', 'ASC')
            ->setFirstResult($offset)
            ->setMaxResults(15);

        $query = $qb->getQuery();

        if ($offset > 0) {
            return $query->getArrayResult();
        } else {
            return $query->execute();
        }
    }

    public function numberOfTricks(): int
    {
        $qb = $this->createQueryBuilder('t')
            ->select('count(t.id)');

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function findOneTrick($slug):array
    {
        $qb = $this->createQueryBuilder('t')
            ->select('t', 'm')
            ->leftJoin('t.media', 'm')
            ->where('t.slug = :slug')
            ->setParameter('slug', $slug);

        $query = $qb->getQuery();

        return $query->getArrayResult();
    }

//    /**
//     * @return trick[] Returns an array of trick objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?trick
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
