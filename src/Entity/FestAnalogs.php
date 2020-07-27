<?php

namespace App\Entity;

use App\Repository\FestAnalogsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FestAnalogsRepository::class)
 */
class FestAnalogs
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
    private $festArt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $festBr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anArt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anBr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFestArt(): ?string
    {
        return $this->festArt;
    }

    public function setFestArt(?string $festArt): self
    {
        $this->festArt = $festArt;

        return $this;
    }

    public function getFestBr(): ?string
    {
        return $this->festBr;
    }

    public function setFestBr(?string $festBr): self
    {
        $this->festBr = $festBr;

        return $this;
    }

    public function getAnArt(): ?string
    {
        return $this->anArt;
    }

    public function setAnArt(?string $anArt): self
    {
        $this->anArt = $anArt;

        return $this;
    }

    public function getAnBr(): ?string
    {
        return $this->anBr;
    }

    public function setAnBr(?string $anBr): self
    {
        $this->anBr = $anBr;

        return $this;
    }
}
