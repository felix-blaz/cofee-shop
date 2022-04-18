<?php

namespace App\Entity;

use App\Repository\OrderCoffeeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderCoffeeRepository::class)]
class OrderCoffee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Coffee::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $coffee;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[ORM\ManyToOne(targetEntity: Order::class, inversedBy: 'items')]
    #[ORM\JoinColumn(nullable: false)]
    private $orderRef;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoffee(): ?Coffee
    {
        return $this->coffee;
    }

    public function setCoffee(?Coffee $coffee): self
    {
        $this->coffee = $coffee;

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

    public function getOrderRef(): ?Order
    {
        return $this->orderRef;
    }

    public function setOrderRef(?Order $orderRef): self
    {
        $this->orderRef = $orderRef;

        return $this;
    }
    public function equals(OrderItem $item): bool
    {
        return $this->getProduct()->getId() === $item->getProduct()->getId();
    }

    public function getTotal(): float
    {
        return $this->getProduct()->getPrice() * $this->getQuantity();
    }
}
