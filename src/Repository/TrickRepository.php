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
        $tricksQuery = $this->createQueryBuilder('t')
            ->select('t.id')
            ->orderBy('t.id', 'ASC')
            ->setFirstResult($offset)
            ->setMaxResults(15)
            ->getQuery();

        $trickIds = $tricksQuery->getSingleColumnResult();

        $tricksWithJoinsQuery = $this->createQueryBuilder('t')
            ->select('t', 'c', 'm')
            ->leftJoin('t.chosenImage', 'c')
            ->leftJoin('t.medias', 'm', 'WITH', "m.type = 'image'")
            ->where('t.id IN (:trickIds)')
            ->setParameter('trickIds', $trickIds)
            ->orderBy('t.id', 'ASC')
            ->getQuery();

        return $tricksWithJoinsQuery->getArrayResult();
    }

    public function numberOfTricks(): int
    {
        $qb = $this->createQueryBuilder('t')
            ->select('count(t.id)');

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function findOneTrick($slug): Trick
    {
        $qb = $this->createQueryBuilder('t')
            ->select('t', 'g', 'm')
            ->leftJoin('t.groupTrick', 'g')
            ->leftJoin('t.medias', 'm')
            ->where('t.slug = :slug')
            ->setParameter('slug', $slug);

        $query = $qb->getQuery();

        return $query->getSingleResult();
    }

    public function findOneByName($name): ?Trick
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.name = :val')
            ->setParameter('val', $name)
            ->getQuery()
            ->getOneOrNullResult()
            ;
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
