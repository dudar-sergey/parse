<?php

namespace App\Entity;

use App\Repository\JcbAnalogRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JcbAnalogRepository::class)
 */
class JcbAnalog
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
    private $prodArt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prodBr;

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

    public function getProdArt(): ?string
    {
        return $this->prodArt;
    }

    public function setProdArt(?string $prodArt): self
    {
        $this->prodArt = $prodArt;

        return $this;
    }

    public function getProdBr(): ?string
    {
        return $this->prodBr;
    }

    public function setProdBr(?string $prodBr): self
    {
        $this->prodBr = $prodBr;

        return $this;
    }

    public function getAnalArt(): ?string
    {
        return $this->analArt;
    }

    public function setAnalArt(?string $AnalArt): self
    {
        $this->analArt = $AnalArt;

        return $this;
    }

    public function getAnalBr(): ?string
    {
        return $this->analBr;
    }

    public function setAnalBr(?string $AnalBr): self
    {
        $this->analBr = $AnalBr;

        return $this;
    }
}
