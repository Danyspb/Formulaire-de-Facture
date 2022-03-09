<?php

namespace App\Entity;

use App\Repository\InvoicLinesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoicLinesRepository::class)]
class InvoicLines
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[ORM\Column(type: 'float')]
    private $amount;

    #[ORM\Column(type: 'float')]
    private $vat_amount;

    #[ORM\Column(type: 'float')]
    private $total_vat;

    #[ORM\ManyToOne(targetEntity: Invoic::class, inversedBy: 'id_invoic')]
    private $invoic;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

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

    public function getVatAmount(): ?float
    {
        return $this->vat_amount;
    }

    public function setVatAmount(float $vat_amount): self
    {
        $this->vat_amount = $vat_amount;

        return $this;
    }

    public function getTotalVat(): ?float
    {
        return $this->total_vat;
    }

    public function setTotalVat(float $total_vat): self
    {
        $this->total_vat = $total_vat;

        return $this;
    }

    public function getInvoic(): ?Invoic
    {
        return $this->invoic;
    }

    public function setInvoic(?Invoic $invoic): self
    {
        $this->invoic = $invoic;

        return $this;
    }
}
