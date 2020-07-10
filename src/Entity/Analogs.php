<?php

namespace App\Entity;

use App\Repository\AnalogsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnalogsRepository::class)
 */
class Analogs
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $ArtDet;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $Analog;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtDet(): ?string
    {
        return $this->ArtDet;
    }

    public function setArtDet(string $ArtDet): self
    {
        $this->ArtDet = $ArtDet;

        return $this;
    }

    public function getAnalog(): ?string
    {
        return $this->Analog;
    }

    public function setAnalog(string $Analog): self
    {
        $this->Analog = $Analog;

        return $this;
    }
}
