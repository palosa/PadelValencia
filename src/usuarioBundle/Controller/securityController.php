<?php

namespace usuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use usuarioBundle\Entity\usuarios;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class securityController extends Controller
{
  public function loginAction(Request $request)
      {

      $authenticationUtils = $this->get('security.authentication_utils');

      // get the login error if there is one
      $error = $authenticationUtils->getLastAuthenticationError();

      // last username entered by the user
      $lastUsername = $authenticationUtils->getLastUsername();

      return $this->render('usuarioBundle:Default:login.html.twig', array(
          'last_username' => $lastUsername,
          'error'         => $error,
      ));
      }
}
