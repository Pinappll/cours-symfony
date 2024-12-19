<?php

namespace App\Repository;

use App\Entity\Categorie;
use App\Entity\Media;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Media>
 */
class MediaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Media::class);
    }


    //    /**
    //     * @return Media[] Returns an array of Media objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('m.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Media
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    /** @return Media[] */
    public function findByCategoryWithPagination(Categorie $category, int $currentPage, int $maxPerPage): array
    {
        // categories ManyToMany relation
        return $this->createQueryBuilder('c')
            ->join('c.categories', 'cat')
            ->where('cat = :category')
            ->setParameter('category', $category)
            ->orderBy('c.id', 'ASC')
            ->setFirstResult(($currentPage - 1) * $maxPerPage)
            ->setMaxResults($maxPerPage)
            ->getQuery()
            ->getResult();

    }
}
