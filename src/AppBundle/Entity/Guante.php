<?php

namespace AppBundle\Entity;

/**
 * Guante
 */
class Guante
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
     * @var string
     */
    private $descripcion;

    /**
     * @var \DateTime
     */
    private $vencimiento;

    /**
     * @var bool
     */
    private $libreDeTalco;

    /**
     * @var string
     */
    private $lote;

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
     * @return Guante
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Guante
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set vencimiento
     *
     * @param \DateTime $vencimiento
     *
     * @return Guante
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
     * Set libreDeTalco
     *
     * @param boolean $libreDeTalco
     *
     * @return Guante
     */
    public function setLibreDeTalco($libreDeTalco)
    {
        $this->libreDeTalco = $libreDeTalco;

        return $this;
    }

    /**
     * Get libreDeTalco
     *
     * @return bool
     */
    public function getLibreDeTalco()
    {
        return $this->libreDeTalco;
    }

    /**
     * Set lote
     *
     * @param string $lote
     *
     * @return Guante
     */
    public function setLote($lote)
    {
        $this->lote = $lote;

        return $this;
    }

    /**
     * Get lote
     *
     * @return string
     */
    public function getLote()
    {
        return $this->lote;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return Guante
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

