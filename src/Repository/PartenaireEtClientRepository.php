<?php

namespace App\Repository;

use App\Entity\PartenaireEtClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PartenaireEtClient>
 *
 * @method PartenaireEtClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartenaireEtClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartenaireEtClient[]    findAll()
 * @method PartenaireEtClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartenaireEtClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartenaireEtClient::class);
    }

    public function save(PartenaireEtClient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PartenaireEtClient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PartenaireEtClient[] Returns an array of PartenaireEtClient objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PartenaireEtClient
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
