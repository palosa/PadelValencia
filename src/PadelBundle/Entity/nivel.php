<?php

namespace PadelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * nivel
 *
 * @ORM\Table(name="nivel")
 * @ORM\Entity(repositoryClass="PadelBundle\Repository\nivelRepository")
 */
class nivel
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nivel", type="string", length=255)
     */
    private $nivel;

    /**
     * @var float
     *
     * @ORM\Column(name="min", type="float")
     */
    private $min;

    /**
     * @var float
     *
     * @ORM\Column(name="max", type="float")
     */
    private $max;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nivel
     *
     * @param string $nivel
     *
     * @return nivel
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return string
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set valor
     *
     * @param float $valor
     *
     * @return nivel
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }
    // ...

       /**
        * @ORM\OneToMany(targetEntity="jugador", mappedBy="nivel")
        */
       private $valor;
}
