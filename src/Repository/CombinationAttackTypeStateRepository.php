<?php

namespace App\Repository;

use App\Entity\CombinationAttackTypeState;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CombinationAttackTypeState>
 *
 * @method CombinationAttackTypeState|null find($id, $lockMode = null, $lockVersion = null)
 * @method CombinationAttackTypeState|null findOneBy(array $criteria, array $orderBy = null)
 * @method CombinationAttackTypeState[]    findAll()
 * @method CombinationAttackTypeState[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CombinationAttackTypeStateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CombinationAttackTypeState::class);
    }

    public function add(CombinationAttackTypeState $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CombinationAttackTypeState $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CombinationAttackTypeState[] Returns an array of CombinationAttackTypeState objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CombinationAttackTypeState
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
