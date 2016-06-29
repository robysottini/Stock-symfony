<?php

namespace AppBundle\Entity;

/**
 * Jeringa
 */
class Jeringa
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $marca;

    /**
     * @var float
     */
    private $capacidad;

    /**
     * @var \DateTime
     */
    private $vencimiento;

    /**
     * @var int
     */
    private $cantidad;


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
     * Set marca
     *
     * @param integer $marca
     *
     * @return Jeringa
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return int
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set capacidad
     *
     * @param float $capacidad
     *
     * @return Jeringa
     */
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    /**
     * Get capacidad
     *
     * @return float
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }

    /**
     * Set vencimiento
     *
     * @param \DateTime $vencimiento
     *
     * @return Jeringa
     */
    public function setVencimiento($vencimiento)
    {
        $this->vencimiento = $vencimiento;

        return $this;
    }

    /**
     * Get vencimiento
     *
     * @return \DateTime
     */
    public function getVencimiento()
    {
        return $this->vencimiento;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return Jeringa
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return int
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }
}

