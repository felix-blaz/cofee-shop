<?php

namespace App\Entity;

use App\Repository\OrderCoffeeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: OrderCoffeeRepository::class)]
class OrderCoffee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Coffee::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $items;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank()]
    #[Assert\GreaterThanOrEqual(1)]
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
        return $this->items;
    }

    public function setCoffee(?Coffee $items): self
    {
        $this->items = $items;

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
    public function equals(OrderCoffee $item): bool
    {
        return $this->getCoffee()->getId() === $item->getCoffee()->getId();
    }

    public function getTotal(): float
    {
        return $this->getCoffee()->getPrice() * $this->getQuantity();
    }
}
