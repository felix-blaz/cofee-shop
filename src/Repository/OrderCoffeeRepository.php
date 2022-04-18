<?php

namespace App\Repository;

use App\Entity\OrderCoffee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrderCoffee|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderCoffee|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderCoffee[]    findAll()
 * @method OrderCoffee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderCoffeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderCoffee::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(OrderCoffee $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(OrderCoffee $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return OrderCoffee[] Returns an array of OrderCoffee objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrderCoffee
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
