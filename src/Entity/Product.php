<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(type="string", length=255)
     */
    private $qrcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ref;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $maker;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ref_maker;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $danger;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $unit;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $color;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $amount;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string|null
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=CommandClient::class, mappedBy="products")
     */
    private $commandClients;

    /**
     * @ORM\ManyToMany(targetEntity=CommandProvider::class, mappedBy="products")
     */
    private $commandProviders;

    /**
     * @ORM\Column(type="float")
     */
    private $step;

    /**
     * @ORM\OneToMany(targetEntity=AdjustStocks::class, mappedBy="product")
     */
    private $adjustStocks;

    /**
     * @ORM\ManyToOne(targetEntity=Provider::class, inversedBy="products")
     */
    private $provider;


    public function __construct()
    {
        $this->commandClients = new ArrayCollection();
        $this->commandProviders = new ArrayCollection();
        $this->adjustStocks = new ArrayCollection();

        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQrcode(): ?string
    {
        return $this->qrcode;
    }

    public function setQrcode(string $qrcode): self
    {
        $this->qrcode = $qrcode;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getMaker(): ?string
    {
        return $this->maker;
    }

    public function setMaker(string $maker): self
    {
        $this->maker = $maker;

        return $this;
    }

    public function getRefMaker(): ?string
    {
        return $this->ref_maker;
    }

    public function setRefMaker(string $ref_maker): self
    {
        $this->ref_maker = $ref_maker;

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

    public function getDanger(): ?bool
    {
        return $this->danger;
    }

    public function setDanger(bool $danger): self
    {
        $this->danger = $danger;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getSize(): ?float
    {
        return $this->size;
    }

    public function setSize(float $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

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

    public function __toString(){
        return (string) $this->category;
    }

    /**
     * @return Collection|CommandClient[]
     */
    public function getCommandClients(): Collection
    {
        return $this->commandClients;
    }

    public function addCommandClient(CommandClient $commandClient): self
    {
        if (!$this->commandClients->contains($commandClient)) {
            $this->commandClients[] = $commandClient;
            $commandClient->addProduct($this);
        }

        return $this;
    }

    public function removeCommandClient(CommandClient $commandClient): self
    {
        if ($this->commandClients->contains($commandClient)) {
            $this->commandClients->removeElement($commandClient);
            $commandClient->removeProduct($this);
        }

        return $this;
    }

    public function getStep(): ?float
    {
        return $this->step;
    }

    public function setStep(float $step): self
    {
        $this->step = $step;

        return $this;
    }

    /**
     * @return Collection|CommandProvider[]
     */
    public function getCommandProviders(): Collection
    {
        return $this->commandProviders;
    }

    public function addCommandProvider(CommandProvider $commandProvider): self
    {
        if (!$this->commandProviders->contains($commandProvider)) {
            $this->commandProviders[] = $commandProvider;
            $commandProvider->addProduct($this);
        }

        return $this;
    }

    public function removeCommandProvider(CommandProvider $commandProvider): self
    {
        if ($this->commandProviders->contains($commandProvider)) {
            $this->commandProviders->removeElement($commandProvider);
            $commandProvider->removeProduct($this);
        }

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
            $adjustStock->setProduct($this);
        }

        return $this;
    }

    public function removeAdjustStock(AdjustStocks $adjustStock): self
    {
        if ($this->adjustStocks->contains($adjustStock)) {
            $this->adjustStocks->removeElement($adjustStock);
            // set the owning side to null (unless already changed)
            if ($adjustStock->getProduct() === $this) {
                $adjustStock->setProduct(null);
            }
        }

        return $this;
    }

    public function getProvider(): ?provider
    {
        return $this->provider;
    }

    public function setProvider(?provider $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

}
