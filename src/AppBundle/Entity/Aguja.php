<?php

namespace AppBundle\Entity;

/**
 * Aguja
 */
class Aguja
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

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
     * Muchos a uno.
     * @var int
     */
    private $marca;


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
     * Sets the value of nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Gets the value of nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Sets the value of capacidad
     *
     * @param float $capacidad
     */
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;
    }

    /**
     * Gets the value of capacidad
     *
     * @return float
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }

    /**
     * Sets the value of vencimiento
     *
     * @param \DateTime $vencimiento
     */
    public function setVencimiento($vencimiento)
    {
        $this->vencimiento = $vencimiento;
    }

    /**
     * Gets the value of vencimiento
     *
     * @return \DateTime
     */
    public function getVencimiento()
    {
        return $this->vencimiento;
    }

    /**
     * Sets the value of cantidad.
     *
     * @param integer $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * Gets the value of cantidad
     *
     * @return int
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Sets the value of marca
     *
     * @param integer $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * Gets the value of marca
     *
     * @return int
     */
    public function getMarca()
    {
        return $this->marca;
    }
}

