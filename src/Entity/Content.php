<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContentRepository")
 */
class Content
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bloc", inversedBy="contents")
     */
    private $id_bloc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $data;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $param;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBloc(): ?Bloc
    {
        return $this->id_bloc;
    }

    public function setIdBloc(?Bloc $id_bloc): self
    {
        $this->id_bloc = $id_bloc;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(?string $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getParam(): ?string
    {
        return $this->param;
    }

    public function setParam(?string $param): self
    {
        $this->param = $param;

        return $this;
    }
}
