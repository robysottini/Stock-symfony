<?php

namespace AppBundle\Entity;

/**
 * Marca
 */
class Marca
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
     * Gets the value of id.
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
     * Gets the value of nombre.
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

