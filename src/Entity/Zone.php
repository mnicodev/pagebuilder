<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ZoneRepository")
 */
class Zone
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $id_format_zone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $param;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Page", inversedBy="zones")
     */
    private $id_page;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bloc", mappedBy="id_zone")
     */
    private $blocs;



    public function __construct()
    {
        $this->contents = new ArrayCollection();
        $this->blocs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFormatZone(): ?string
    {
        return $this->id_format_zone;
    }

    public function setIdFormatZone(string $id_format_zone): self
    {
        $this->id_format_zone = $id_format_zone;

        return $this;
    }

    public function getParam(): ?string
    {
        return $this->param;
    }

    public function setParam(string $param): self
    {
        $this->param = $param;

        return $this;
    }

    public function getIdPage(): ?Page
    {
        return $this->id_page;
    }

    public function setIdPage(?Page $id_page): self
    {
        $this->id_page = $id_page;

        return $this;
    }

    /**
     * @return Collection|Bloc[]
     */
    public function getBlocs(): Collection
    {
        return $this->blocs;
    }

    public function addBloc(Bloc $bloc): self
    {
        if (!$this->blocs->contains($bloc)) {
            $this->blocs[] = $bloc;
            $bloc->setIdZone($this);
        }

        return $this;
    }

    public function removeBloc(Bloc $bloc): self
    {
        if ($this->blocs->contains($bloc)) {
            $this->blocs->removeElement($bloc);
            // set the owning side to null (unless already changed)
            if ($bloc->getIdZone() === $this) {
                $bloc->setIdZone(null);
            }
        }

        return $this;
    }




}
