<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientsRepository::class)
 */
class Clients
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $priority;

    /**
     * @ORM\Column(type="integer")
     */
    private $no_command;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type_delivery;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $mode_pay;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $qrcode;

    /**
     * @ORM\Column(type="float")
     */
    private $percent_pay;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_pallet;

    /**
     * @ORM\Column(type="date")
     */
    private $date_command;

    /**
     * @ORM\Column(type="date")
     */
    private $date_prepar;

    /**
     * @ORM\Column(type="date")
     */
    private $date_pay;

    /**
     * @ORM\Column(type="date")
     */
    private $date_submit;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment_command;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment_delivery;

    /**
     * @ORM\Column(type="float")
     */
    private $total_weight;

    /**
     * @ORM\Column(type="float")
     */
    private $total_amount;

    /**
     * @ORM\Column(type="float")
     */
    private $total_price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

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

    public function getNoCommand(): ?int
    {
        return $this->no_command;
    }

    public function setNoCommand(int $no_command): self
    {
        $this->no_command = $no_command;

        return $this;
    }

    public function getTypeDelivery(): ?string
    {
        return $this->type_delivery;
    }

    public function setTypeDelivery(string $type_delivery): self
    {
        $this->type_delivery = $type_delivery;

        return $this;
    }

    public function getModePay(): ?string
    {
        return $this->mode_pay;
    }

    public function setModePay(string $mode_pay): self
    {
        $this->mode_pay = $mode_pay;

        return $this;
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

    public function getPercentPay(): ?float
    {
        return $this->percent_pay;
    }

    public function setPercentPay(float $percent_pay): self
    {
        $this->percent_pay = $percent_pay;

        return $this;
    }

    public function getNbPallet(): ?int
    {
        return $this->nb_pallet;
    }

    public function setNbPallet(int $nb_pallet): self
    {
        $this->nb_pallet = $nb_pallet;

        return $this;
    }

    public function getDateCommand(): ?\DateTimeInterface
    {
        return $this->date_command;
    }

    public function setDateCommand(\DateTimeInterface $date_command): self
    {
        $this->date_command = $date_command;

        return $this;
    }

    public function getDatePrepar(): ?\DateTimeInterface
    {
        return $this->date_prepar;
    }

    public function setDatePrepar(\DateTimeInterface $date_prepar): self
    {
        $this->date_prepar = $date_prepar;

        return $this;
    }

    public function getDatePay(): ?\DateTimeInterface
    {
        return $this->date_pay;
    }

    public function setDatePay(\DateTimeInterface $date_pay): self
    {
        $this->date_pay = $date_pay;

        return $this;
    }

    public function getDateSubmit(): ?\DateTimeInterface
    {
        return $this->date_submit;
    }

    public function setDateSubmit(\DateTimeInterface $date_submit): self
    {
        $this->date_submit = $date_submit;

        return $this;
    }

    public function getCommentCommand(): ?string
    {
        return $this->comment_command;
    }

    public function setCommentCommand(?string $comment_command): self
    {
        $this->comment_command = $comment_command;

        return $this;
    }

    public function getCommentDelivery(): ?string
    {
        return $this->comment_delivery;
    }

    public function setCommentDelivery(?string $comment_delivery): self
    {
        $this->comment_delivery = $comment_delivery;

        return $this;
    }

    public function getTotalWeight(): ?float
    {
        return $this->total_weight;
    }

    public function setTotalWeight(float $total_weight): self
    {
        $this->total_weight = $total_weight;

        return $this;
    }

    public function getTotalAmount(): ?float
    {
        return $this->total_amount;
    }

    public function setTotalAmount(float $total_amount): self
    {
        $this->total_amount = $total_amount;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->total_price;
    }

    public function setTotalPrice(float $total_price): self
    {
        $this->total_price = $total_price;

        return $this;
    }
}
