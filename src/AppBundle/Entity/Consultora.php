<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Email
 *
 * @ORM\Table(name="Consultora")
 * @ORM\Entity()
 */
class Consultora
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=250)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Candidato", mappedBy="consultora")
     */
    private $candidatos;

    /**
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->nombre? $this->nombre : '';
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->candidatos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
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
     * @return Consultora
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
     * Add candidato
     *
     * @param \AppBundle\Entity\Candidato $candidato
     *
     * @return Consultora
     */
    public function addCandidato(\AppBundle\Entity\Candidato $candidato)
    {
        $this->candidatos[] = $candidato;

        return $this;
    }

    /**
     * Remove candidato
     *
     * @param \AppBundle\Entity\Candidato $candidato
     */
    public function removeCandidato(\AppBundle\Entity\Candidato $candidato)
    {
        $this->candidatos->removeElement($candidato);
    }

    /**
     * Get candidatos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCandidatos()
    {
        return $this->candidatos;
    }
}
