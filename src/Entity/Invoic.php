<?php

namespace App\Entity;

use App\Repository\InvoicRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoicRepository::class)]
#[UniqueEntity(
    fields: ['invoice_number'],
    errorPath: 'invoice_number',
    message: 'Warning this Invoic ID already exists !!!',
)]
#[UniqueEntity(
    fields: ['customer_ID'],
    errorPath: 'customer_ID',
    message: 'Warning this Custumer ID already exists !!!',
)]
class Invoic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $invoice_date;

    #[ORM\Column(type: 'integer')]
    private $invoice_number;

    #[ORM\Column(type: 'integer')]
    private $customer_ID;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoiceDate(): ?\DateTimeInterface
    {
        return $this->invoice_date;
    }

    public function setInvoiceDate(\DateTimeInterface $invoice_date): self
    {
        $this->invoice_date = $invoice_date;

        return $this;
    }

    public function getInvoiceNumber(): ?int
    {
        return $this->invoice_number;
    }

    public function setInvoiceNumber(int $invoice_number): self
    {
        $this->invoice_number = $invoice_number;

        return $this;
    }

    public function getCustomerID(): ?int
    {
        return $this->customer_ID;
    }

    public function setCustomerID(int $customer_ID): self
    {
        $this->customer_ID = $customer_ID;

        return $this;
    }

    public function __toString()
    {
        return strval($this->invoice_number);
    }
}
