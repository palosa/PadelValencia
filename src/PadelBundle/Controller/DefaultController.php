<?php

namespace PadelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use cervezasBundle\Entity\torneo;


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
    public function jugadoresAction()
    {
          $repository = $this->getDoctrine()->getRepository('PadelBundle:jugador');

          $jugadores = $repository->findAll();

        return $this->render('PadelBundle:Default:jugadoresClub.html.twig',array('tablaJugador'=>$jugadores));
    }
}
