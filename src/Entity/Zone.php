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
    private $options;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Page", inversedBy="zones")
     */
    private $id_page;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Content", mappedBy="id_zone")
     */
    private $contents;

    public function __construct()
    {
        $this->contents = new ArrayCollection();
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

    /**
     * @return Collection|Content[]
     */
    public function getContents(): Collection
    {
        return $this->contents;
    }

    public function addContent(Content $content): self
    {
        if (!$this->contents->contains($content)) {
            $this->contents[] = $content;
            $content->setIdZone($this);
        }

        return $this;
    }

    public function removeContent(Content $content): self
    {
        if ($this->contents->contains($content)) {
            $this->contents->removeElement($content);
            // set the owning side to null (unless already changed)
            if ($content->getIdZone() === $this) {
                $content->setIdZone(null);
            }
        }

        return $this;
    }
}
