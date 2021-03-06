<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
    private $url;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $part;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * @ORM\Column(type="boolean", length=255, nullable=true)
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

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPart(): ?string
    {
        return $this->part;
    }

    public function setPart(string $part): self
    {
        $this->part = $part;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl($url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand($brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg($img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getHandled(): ?string
    {
        return $this->handled;
    }

    public function setHandled($handled): self
    {
        $this->handled = $handled;

        return $this;
    }

    public function getGroup(): ?string
    {
        return $this->gr;
    }

    public function setGroup($gr): self
    {
        $this->gr = $gr;

        return $this;
    }
    public function getSubGr(): ?string
    {
        return $this->subGr;
    }

    public function setSubGr($subGr): self
    {
        $this->subGr = $subGr;

        return $this;
    }
}
