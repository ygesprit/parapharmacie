<?php

namespace App\Entity;

use App\Repository\RepenseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RepenseRepository::class)
 */
class Repense
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prop;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $datecr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProp(): ?string
    {
        return $this->prop;
    }

    public function setProp(string $prop): self
    {
        $this->prop = $prop;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDatecr(): ?\DateTimeInterface
    {
        return $this->datecr;
    }

    public function setDatecr(\DateTimeInterface $datecr): self
    {
        $this->datecr = $datecr;

        return $this;
    }
}
