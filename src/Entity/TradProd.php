<?php

namespace App\Entity;

use App\Repository\TradProdRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TradProdRepository::class)
 */
class TradProd
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
    private $text;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $art;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $tech = [];

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $handled;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subGr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getArt(): ?string
    {
        return $this->art;
    }

    public function setArt(?string $art): self
    {
        $this->art = $art;

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

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getTech(): ?array
    {
        return $this->tech;
    }

    public function setTech(?array $tech): self
    {
        $this->tech = $tech;

        return $this;
    }

    public function getHandled(): ?bool
    {
        return $this->handled;
    }

    public function setHandled(?bool $handled): self
    {
        $this->handled = $handled;

        return $this;
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
}
