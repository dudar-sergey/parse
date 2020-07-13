<?php

namespace App\Entity;

use App\Repository\GroupRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupRepository::class)
 * @ORM\Table(name="`group`")
 */
class Group
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
    private $mainGr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subGr;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $Url;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMainGr(): ?string
    {
        return $this->mainGr;
    }

    public function setMainGr(string $mainGr): self
    {
        $this->mainGr = $mainGr;

        return $this;
    }

    public function getSubGr(): ?string
    {
        return $this->subGr;
    }

    public function setSubGr(string $subGr): self
    {
        $this->subGr = $subGr;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->Url;
    }

    public function setUrl(string $Url): self
    {
        $this->Url = $Url;

        return $this;
    }
}
