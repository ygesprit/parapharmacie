<?php

namespace App\Entity;

use App\Repository\RoutineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoutineRepository::class)
 */
class Routine
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
    private $nameRoutine;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notification;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, inversedBy="routines")
     */
    private $products;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="routines")
     */
    private $user;



    public function __construct()
    {
        $this->products = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameRoutine(): ?string
    {
        return $this->nameRoutine;
    }

    public function setNameRoutine(string $nameRoutine): self
    {
        $this->nameRoutine = $nameRoutine;

        return $this;
    }

    public function getNotification(): ?string
    {
        return $this->notification;
    }

    public function setNotification(string $notification): self
    {
        $this->notification = $notification;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        $this->products->removeElement($product);

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }


}
