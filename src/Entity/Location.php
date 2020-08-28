<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
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
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $fillRate;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="locations")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=AdjustStocks::class, mappedBy="location")
     */
    private $adjustStocks;

    public function __construct()
    {
        $this->adjustStocks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFillRate(): ?float
    {
        return $this->fillRate;
    }

    public function setFillRate(float $fillRate): self
    {
        $this->fillRate = $fillRate;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|AdjustStocks[]
     */
    public function getAdjustStocks(): Collection
    {
        return $this->adjustStocks;
    }

    public function addAdjustStock(AdjustStocks $adjustStock): self
    {
        if (!$this->adjustStocks->contains($adjustStock)) {
            $this->adjustStocks[] = $adjustStock;
            $adjustStock->setLocation($this);
        }

        return $this;
    }

    public function removeAdjustStock(AdjustStocks $adjustStock): self
    {
        if ($this->adjustStocks->contains($adjustStock)) {
            $this->adjustStocks->removeElement($adjustStock);
            // set the owning side to null (unless already changed)
            if ($adjustStock->getLocation() === $this) {
                $adjustStock->setLocation(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->name;
    }
}
