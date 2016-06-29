<?php

namespace AppBundle\Entity;

/**
 * Comprimido
 */
class Comprimido
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
     * @var int
     */
    private $marca;

    /**
     * @var int
     */
    private $principioActivo;

    /**
     * @var float
     */
    private $peso;

    /**
     * @var \DateTime
     */
    private $vencimiento;

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Comprimido
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set marca
     *
     * @param integer $marca
     *
     * @return Comprimido
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
     * Set principioActivo
     *
     * @param integer $principioActivo
     *
     * @return Comprimido
     */
    public function setPrincipioActivo($principioActivo)
    {
        $this->principioActivo = $principioActivo;

        return $this;
    }

    /**
     * Get principioActivo
     *
     * @return int
     */
    public function getPrincipioActivo()
    {
        return $this->principioActivo;
    }

    /**
     * Set peso
     *
     * @param float $peso
     *
     * @return Comprimido
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get peso
     *
     * @return float
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set vencimiento
     *
     * @param \DateTime $vencimiento
     *
     * @return Comprimido
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
     * Set lote
     *
     * @param string $lote
     *
     * @return Comprimido
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
     * @return Comprimido
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

