<?php

namespace usuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use usuarioBundle\Entity\usuarios;
use usuarioBundle\Form\usuariosType;

class usuariosController extends Controller
{
  public function usuarioAction()
  {
        $repository = $this->getDoctrine()->getRepository('usuarioBundle:usuarios');

        $usuarios = $repository->findAll();

      return $this->render('usuarioBundle:Default:verUsuario.html.twig',array('tablausuario'=>$usuarios));
  }

  public function actualizarUsuarioAction(Request $request,$id)
  {
      $usuarios = $this->getDoctrine()->getRepository('usuarioBundle:usuarios')->find($id);
        if (!$usuarios){
          return $this->redirectToRoute('usuario_actualizar');
        }
      $form = $this->createForm(\usuarioBundle\Form\usuariosModType::class, $usuarios);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid())
      {
          $DB = $this->getDoctrine()->getManager();
          $DB->persist($usuarios);
          $DB->flush();
          return $this->redirectToRoute('usuario_listado', ["id" => $id]);
      }
      return $this->render('usuarioBundle:Default:modUsuario.html.twig', array('form'=>$form->createView() ));
  }
  public function eliminarUsuarioAction($id)
  {
          $DB = $this->getDoctrine()->getManager();

          $usuarios = $DB->getRepository('usuarioBundle:usuarios')->find($id);

          $DB->remove($usuarios);
          $DB->flush();

      return $this->redirectToRoute('usuario_listado');
  }
}
