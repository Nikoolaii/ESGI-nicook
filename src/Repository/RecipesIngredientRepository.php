<?php

namespace App\Repository;

use App\Entity\RecipesIngredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RecipesIngredient>
 *
 * @method RecipesIngredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecipesIngredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecipesIngredient[]    findAll()
 * @method RecipesIngredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipesIngredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecipesIngredient::class);
    }

//    /**
//     * @return RecipesIngredient[] Returns an array of RecipesIngredient objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RecipesIngredient
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
