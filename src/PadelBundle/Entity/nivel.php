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
     * @var string
     *
     * @ORM\Column(name="max", type="string", length=255)
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
     * Set min
     *
     * @param float $min
     *
     * @return nivel
     */
    public function setMin($min)
    {
        $this->min = $min;

        return $this;
    }

    /**
     * Get min
     *
     * @return float
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * Set max
     *
     * @param float $max
     *
     * @return nivel
     */
    public function setMax($max)
    {
        $this->max = $max;

        return $this;
    }

    /**
     * Get max
     *
     * @return float
     */
    public function getMax()
    {
        return $this->max;
    }
}
