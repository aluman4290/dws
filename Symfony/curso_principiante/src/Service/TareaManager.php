<?php

namespace App\Service;

use App\Repository\TareaRepository;
use App\Entity\Tarea;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TareaManager extends AbstractController
{
    private $doctrine;
    private $tareaRepository;
    private $validator;

    public function __construct(
        TareaRepository $tareaRepository,
        EntityManagerInterface $doctrine,
        ValidatorInterface $validator
    ) {
        $this->doctrine = $doctrine;
        $this->tareaRepository = $tareaRepository;
        $this->validator = $validator;
    }

    public function crear(Tarea $tarea): void
    {
        $this->doctrine->persist($tarea);
        $this->doctrine->flush();
    }

    public function editar(): void
    {
        $this->doctrine->flush();
    }

    public function eliminar(Tarea $tarea): void
    {
        $this->doctrine->remove($tarea);
        $this->doctrine->flush();
    }

    public function validar(Tarea $tarea)
    {
        $errores = $this->validator->validate($tarea);
        return $errores;
    }

    public function mostrarErrores($errores)
    {
        foreach ($errores as $error) {
            $this->addFlash('warning', $error->getMessage());
        }
    }
}
