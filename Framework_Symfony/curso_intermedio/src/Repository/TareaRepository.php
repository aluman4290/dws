<?php

namespace App\Repository;

use App\Entity\Tarea;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tarea|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tarea|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tarea[]    findAll()
 * @method Tarea[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TareaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tarea::class);
    }

    public function paginacion($dql, $pagina, $elementosPorPagina)
    {
        $paginador = new Paginator($dql);
        $paginador->getQuery()
            ->setFirstResult($elementosPorPagina * ($pagina - 1))
            ->setMaxResults($elementosPorPagina);
        return $paginador;
    }

    public function buscarTodas($pagina = 1, $elementosPorPagina = 5)
    {
        $query = $this->createQueryBuilder('t')
            ->getQuery();
        return $this->paginacion($query, $pagina, $elementosPorPagina);
    }
    public function buscarTareaPorDescripcion(string $descripcion)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.descripcion = :valorDescripcion')
            ->setParameter('valorDescripcion', $descripcion)
            ->getQuery()
            ->getOneOrNullResult();
    }

    // /**
    //  * @return Tarea[] Returns an array of Tarea objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tarea
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
