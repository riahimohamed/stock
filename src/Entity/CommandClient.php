<?php

namespace App\Entity;

use App\Repository\CommandClientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandClientRepository::class)
 */
class CommandClient
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
    private $locale;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $priority;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nocmd;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeDelivery;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $modePay;

    /**
     * @ORM\Column(type="float")
     */
    private $percentPay;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCmd;

    /**
     * @ORM\Column(type="date")
     */
    private $datePreparation;

    /**
     * @ORM\Column(type="date")
     */
    private $datePay;

    /**
     * @ORM\Column(type="date")
     */
    private $dateSumit;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentCmd;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentDelivery;

    /**
     * @ORM\Column(type="float")
     */
    private $totalWeight;

    /**
     * @ORM\Column(type="float")
     */
    private $totalAmount;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="float")
     */
    private $totalPrice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPriority(): ?string
    {
        return $this->priority;
    }

    public function setPriority(string $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getNocmd(): ?string
    {
        return $this->nocmd;
    }

    public function setNocmd(string $nocmd): self
    {
        $this->nocmd = $nocmd;

        return $this;
    }

    public function getTypeDelivery(): ?string
    {
        return $this->typeDelivery;
    }

    public function setTypeDelivery(string $typeDelivery): self
    {
        $this->typeDelivery = $typeDelivery;

        return $this;
    }

    public function getModePay(): ?string
    {
        return $this->modePay;
    }

    public function setModePay(string $modePay): self
    {
        $this->modePay = $modePay;

        return $this;
    }

    public function getPercentPay(): ?float
    {
        return $this->percentPay;
    }

    public function setPercentPay(float $percentPay): self
    {
        $this->percentPay = $percentPay;

        return $this;
    }

    public function getDateCmd(): ?\DateTimeInterface
    {
        return $this->dateCmd;
    }

    public function setDateCmd(\DateTimeInterface $dateCmd): self
    {
        $this->dateCmd = $dateCmd;

        return $this;
    }

    public function getDatePreparation(): ?\DateTimeInterface
    {
        return $this->datePreparation;
    }

    public function setDatePreparation(\DateTimeInterface $datePreparation): self
    {
        $this->datePreparation = $datePreparation;

        return $this;
    }

    public function getDatePay(): ?\DateTimeInterface
    {
        return $this->datePay;
    }

    public function setDatePay(\DateTimeInterface $datePay): self
    {
        $this->datePay = $datePay;

        return $this;
    }

    public function getDateSumit(): ?\DateTimeInterface
    {
        return $this->dateSumit;
    }

    public function setDateSumit(\DateTimeInterface $dateSumit): self
    {
        $this->dateSumit = $dateSumit;

        return $this;
    }

    public function getCommentCmd(): ?string
    {
        return $this->commentCmd;
    }

    public function setCommentCmd(?string $commentCmd): self
    {
        $this->commentCmd = $commentCmd;

        return $this;
    }

    public function getCommentDelivery(): ?string
    {
        return $this->commentDelivery;
    }

    public function setCommentDelivery(?string $commentDelivery): self
    {
        $this->commentDelivery = $commentDelivery;

        return $this;
    }

    public function getTotalWeight(): ?float
    {
        return $this->totalWeight;
    }

    public function setTotalWeight(float $totalWeight): self
    {
        $this->totalWeight = $totalWeight;

        return $this;
    }

    public function getTotalAmount(): ?float
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(float $totalAmount): self
    {
        $this->totalAmount = $totalAmount;

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

    public function getTotalPrice(): ?float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(float $totalPrice): self
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }
}
