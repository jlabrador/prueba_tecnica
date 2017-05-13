<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Email
 *
 * @ORM\Table(name="Candidato")
 * @ORM\Entity()
 */
class Candidato
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
     * @ORM\Column(name="email", type="string", length=250)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=250, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="nota_prueba", type="string", length=2, nullable=true)
     */
    private $notaPrueba;

    /**
     * @var string
     *
     * @ORM\Column(name="nota_entrevista", type="string", length=2, nullable=true)
     */
    private $notaEntrevista;

    /**
     * @var string
     *
     * @ORM\Column(name="url_prueba", type="string", length=250, nullable=true)
     */
    private $urlPrueba;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=2000, nullable=true)
     */
    protected $observaciones;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hora_prueba", type="datetime")
     */
    private $fechaHoraPrueba;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hora_entrevista", type="datetime", nullable=true)
     */
    private $fechaHoraEntrevista;

    /**
     * @var \AppBundle\Entity\Estado
     *
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Estado", inversedBy="candidatos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estado", referencedColumnName="id")
     * })
     */
    private $estado;

    /**
     * @var \AppBundle\Entity\Consultora
     *
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Consultora", inversedBy="candidatos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="consultora", referencedColumnName="id")
     * })
     */
    private $consultora;

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
     * Set email
     *
     * @param string $email
     *
     * @return Candidato
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set estado
     *
     * @param \AppBundle\Entity\Estado $estado
     *
     * @return Candidato
     */
    public function setEstado(\AppBundle\Entity\Estado $estado = null)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \AppBundle\Entity\Estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set notaPrueba
     *
     * @param string $notaPrueba
     *
     * @return Candidato
     */
    public function setNotaPrueba($notaPrueba)
    {
        $this->notaPrueba = $notaPrueba;

        return $this;
    }

    /**
     * Get notaPrueba
     *
     * @return string
     */
    public function getNotaPrueba()
    {
        return $this->notaPrueba;
    }

    /**
     * Set notaEntrevista
     *
     * @param string $notaEntrevista
     *
     * @return Candidato
     */
    public function setNotaEntrevista($notaEntrevista)
    {
        $this->notaEntrevista = $notaEntrevista;

        return $this;
    }

    /**
     * Get notaEntrevista
     *
     * @return string
     */
    public function getNotaEntrevista()
    {
        return $this->notaEntrevista;
    }

    /**
     * Set urlPrueba
     *
     * @param string $urlPrueba
     *
     * @return Candidato
     */
    public function setUrlPrueba($urlPrueba)
    {
        $this->urlPrueba = $urlPrueba;

        return $this;
    }

    /**
     * Get urlPrueba
     *
     * @return string
     */
    public function getUrlPrueba()
    {
        return $this->urlPrueba;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return Candidato
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }


    /**
     * Set fechaHoraPrueba
     *
     * @param \DateTime $fechaHoraPrueba
     *
     * @return Candidato
     */
    public function setFechaHoraPrueba($fechaHoraPrueba)
    {
        $this->fechaHoraPrueba = $fechaHoraPrueba;

        return $this;
    }

    /**
     * Get fechaHoraPrueba
     *
     * @return \DateTime
     */
    public function getFechaHoraPrueba()
    {
        return $this->fechaHoraPrueba;
    }

    /**
     * Set fechaHoraEntrevista
     *
     * @param \DateTime $fechaHoraEntrevista
     *
     * @return Candidato
     */
    public function setFechaHoraEntrevista($fechaHoraEntrevista)
    {
        $this->fechaHoraEntrevista = $fechaHoraEntrevista;

        return $this;
    }

    /**
     * Get fechaHoraEntrevista
     *
     * @return \DateTime
     */
    public function getFechaHoraEntrevista()
    {
        return $this->fechaHoraEntrevista;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Candidato
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
     * Set consultora
     *
     * @param \AppBundle\Entity\Consultora $consultora
     *
     * @return Candidato
     */
    public function setConsultora(\AppBundle\Entity\Consultora $consultora = null)
    {
        $this->consultora = $consultora;

        return $this;
    }

    /**
     * Get consultora
     *
     * @return \AppBundle\Entity\Consultora
     */
    public function getConsultora()
    {
        return $this->consultora;
    }
}
