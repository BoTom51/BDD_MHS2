<?php

namespace App\Repository;

use App\Entity\CombinationMonsterRidingAction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CombinationMonsterRidingAction>
 *
 * @method CombinationMonsterRidingAction|null find($id, $lockMode = null, $lockVersion = null)
 * @method CombinationMonsterRidingAction|null findOneBy(array $criteria, array $orderBy = null)
 * @method CombinationMonsterRidingAction[]    findAll()
 * @method CombinationMonsterRidingAction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CombinationMonsterRidingActionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CombinationMonsterRidingAction::class);
    }

    public function add(CombinationMonsterRidingAction $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CombinationMonsterRidingAction $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CombinationMonsterRidingAction[] Returns an array of CombinationMonsterRidingAction objects
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

//    public function findOneBySomeField($value): ?CombinationMonsterRidingAction
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
