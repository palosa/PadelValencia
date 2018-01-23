<?php

namespace usuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use usuarioBundle\Entity\usuarios;
use usuarioBundle\Form\usuariosType;

class registroController extends Controller
{
  public function registerAction(Request $request)
  {
      // 1) build the form
      $usuario = new usuarios();
      $form = $this->createForm(usuariosType::class, $usuario);

      // 2) handle the submit (will only happen on POST)
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {

          // 3) Encode the password (you could also do this via Doctrine listener)
          $password = $this->get('security.password_encoder')->encodePassword($usuario, $usuario->getPlainPassword());
          $usuario->setPassword($password);
          // $password = $passwordEncoder->encodePassword($usuario, $usuario->getPlainPassword());
          // $usuario->setPassword($password);
          // 4) save the User!
          $roles = ["ROLE_ADMIN"];
          $usuario->setRoles($roles);
          $DB = $this->getDoctrine()->getManager();
          $DB->persist($usuario);
          $DB->flush();

          // ... do any other work - like sending them an email, etc
          // maybe set a "flash" success message for the user

          return $this->redirectToRoute('padel_homepage');
      }
      return $this->render('usuarioBundle:Default:insertarUsuario.html.twig',array('form' => $form->createView()));
  }
}
