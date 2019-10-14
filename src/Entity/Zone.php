<?php

namespace App\Entity;

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
    private $options;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Page", inversedBy="zones")
     */
    private $id_page;

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

    public function getOptions(): ?string
    {
        return $this->options;
    }

    public function setOptions(string $options): self
    {
        $this->options = $options;

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
}
