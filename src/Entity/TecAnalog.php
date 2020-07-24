<?php

namespace App\Entity;

use App\Repository\TecAnalogRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TecAnalogRepository::class)
 */
class TecAnalog
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tecArt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tecBr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $analArt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $analBr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTecArt(): ?string
    {
        return $this->tecArt;
    }

    public function setTecArt(?string $tecArt): self
    {
        $this->tecArt = $tecArt;

        return $this;
    }

    public function getTecBr(): ?string
    {
        return $this->tecBr;
    }

    public function setTecBr(?string $tecBr): self
    {
        $this->tecBr = $tecBr;

        return $this;
    }

    public function getAnalArt(): ?string
    {
        return $this->analArt;
    }

    public function setAnalArt(?string $analArt): self
    {
        $this->analArt = $analArt;

        return $this;
    }

    public function getAnalBr(): ?string
    {
        return $this->analBr;
    }

    public function setAnalBr(?string $analBr): self
    {
        $this->analBr = $analBr;

        return $this;
    }
}
