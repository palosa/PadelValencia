<?php

namespace PadelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PadelBundle\Entity\jugador;
use PadelBundle\Form\jugadorType;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PadelBundle:Default:index.html.twig');
    }
    public function partidasAction()
    {
        return $this->render('PadelBundle:Default:partidas.html.twig');
    }
    public function nombreAction($nombre)
    {
          $repository = $this->getDoctrine()->getRepository('PadelBundle:jugador');

          $jugadores = $repository->findBynombre($nombre);

        return $this->render('PadelBundle:Default:nombreJugadoresClub.html.twig',array('nombre'=>$jugadores));
    }
    public function nombreIdAction($id)
    {
          $repository = $this->getDoctrine()->getRepository('PadelBundle:jugador');


          $jugadores = $repository->find($id);

        return $this->render('PadelBundle:Default:nombreIdJugadoresClub.html.twig',array('id'=>$jugadores));
    }
}
