<?php

namespace AppBundle\Entity;

/**
 * Torniquete
 */
class Torniquete
{
    /**
     * @var int
     */
    private $id;

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
     * Gets the value of id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of cantidad
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

