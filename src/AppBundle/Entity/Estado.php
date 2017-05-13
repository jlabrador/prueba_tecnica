<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Email
 *
 * @ORM\Table(name="Estado")
 * @ORM\Entity()
 */
class Estado
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
    private $estado;

    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Candidato", mappedBy="estado")
     */
    private $candidatos;

    /**
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->estado? $this->estado : '';
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
     * Set estado
     *
     * @param string $estado
     *
     * @return Estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Add candidato
     *
     * @param \AppBundle\Entity\Candidato $candidato
     *
     * @return Estado
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
