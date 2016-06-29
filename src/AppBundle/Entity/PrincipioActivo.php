<?php

namespace AppBundle\Entity;

/**
 * PrincipioActivo
 */
class PrincipioActivo
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
     * @return PrincipioActivo
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
     * Permite a esta clase decidir cómo comportarse cuando se la trata como un
     * string.
     * @return string Nombre de la marca.
     */
    public function __toString()
    {
        return $this->nombre;
    }
}

