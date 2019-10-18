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
     * @ORM\OneToOne(targetEntity="App\Entity\ContentType", cascade={"persist", "remove"})
     */
    private $id_type_content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bundle;

    /**
     * @ORM\Column(type="text")
     */
    private $value;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTypeContent(): ?ContentType
    {
        return $this->id_type_content;
    }

    public function setIdTypeContent(?ContentType $id_type_content): self
    {
        $this->id_type_content = $id_type_content;

        return $this;
    }

    public function getBundle(): ?string
    {
        return $this->bundle;
    }

    public function setBundle(string $bundle): self
    {
        $this->bundle = $bundle;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }


}
