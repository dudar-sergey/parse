<?php

namespace App\Entity;

use App\Repository\TradGrRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TradGrRepository::class)
 */
class TradGr
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
    private $gr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subGr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGr(): ?string
    {
        return $this->gr;
    }

    public function setGr(?string $gr): self
    {
        $this->gr = $gr;

        return $this;
    }

    public function getSubGr(): ?string
    {
        return $this->subGr;
    }

    public function setSubGr(?string $subGr): self
    {
        $this->subGr = $subGr;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
