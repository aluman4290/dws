<?php

namespace App\Controller;

use App\Repository\TareaRepository;
use App\Entity\Tarea;
use App\Service\TareaManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TareaController extends AbstractController
{
    #[Route('/', name: 'app_listado_tarea')]
    public function listado(TareaRepository $tareaRepository)
    {
        $tareas =  $tareaRepository->findAll();
        return $this->render('tarea/listado.html.twig', [
            'tareas' => $tareas,
        ]);
    }

    #[Route('/tarea/crear', name: 'app_crear_tarea')]
    public function crear(Request $request, TareaManager $tareaManager)
    {
        $tarea = new Tarea();
        $descripcion = $request->request->get('descripcion', null);
        if (null !== $descripcion) {
            $tarea->setDescripcion($descripcion);
            $errores = $tareaManager->validar($tarea);
            if (empty($errores)) {
                $tareaManager->crear($tarea);
                $this->addFlash('success', 'Tarea creada correctamente');
                return $this->redirectToRoute('app_listado_tarea');
            } else {
                $tareaManager->mostrarErrores($errores);
            }
        }
        return $this->render('tarea/crear.html.twig', [
            'tarea' => $tarea,
        ]);
    }

    #[Route('/tarea/editar/{id}', name: 'app_editar_tarea')]
    public function editar(int $id, TareaRepository $tareaRepository, Request $request, TareaManager $tareaManager)
    {
        $tarea = $tareaRepository->findOneById($id);
        if (null === $tarea) {
            throw $this->createNotFoundException();
        }
        $descripcion = $request->request->get('descripcion', null);
        if (null !== $descripcion) {
            if (!empty($descripcion)) {
                $tarea->setDescripcion($descripcion);
                $tareaManager->editar();
                $this->addFlash('success', 'Tarea editada correctamente');
                return $this->redirectToRoute('app_listado_tarea');
            } else {
                $this->addFlash('warning', 'El campo descripción es obligatorio');
            }
        }
        return $this->render('tarea/editar.html.twig', [
            'tarea' => $tarea,
        ]);
    }

    #[Route('/tarea/editar/{id}', name: 'app_editar_tarea_con_params')]
    public function editarTareaConParamsConvert(Tarea $tarea, Request $request, TareaManager $tareaManager)
    {
        $descripcion = $request->request->get('descripcion', null);
        if (null !== $descripcion) {
            if (!empty($descripcion)) {
                $tarea->setDescripcion($descripcion);
                $tareaManager->editar();
                $this->addFlash('success', 'Tarea editada correctamente');
                return $this->redirectToRoute('app_listado_tarea');
            } else {
                $this->addFlash('warning', 'El campo descripción es obligatorio');
            }
        }
        return $this->render('tarea/editar.html.twig', [
            'tarea' => $tarea,
        ]);
    }

    #[Route('/tarea/eliminar/{id}', name: 'app_eliminar_tarea')]
    public function eliminar(Tarea $tarea, TareaManager $tareaManager)
    {
        $tareaManager->eliminar($tarea);
        $this->addFlash('success', 'Tarea eliminada correctamente');
        return $this->redirectToRoute('app_listado_tarea');
    }
}
