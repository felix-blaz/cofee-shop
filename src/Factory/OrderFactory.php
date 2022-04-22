<?php
namespace App\Factory;

use App\Entity\Order;
use App\Entity\OrderCoffee;
use App\Entity\Coffee;

/**
 * Class OrderFactory
 * @package App\Factory
 */
class OrderFactory
{
    /**
     * Creates an order.
     *
     * @return Order
     */
    public function create(): Order
    {
        $order = new Order();
        $order
            ->setStatus(Order::STATUS_CART)
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime());

        return $order;
    }

    /**
     * Creates an item for a coffee.
     *
     * @param Coffee $coffee
     *
     * @return OrderCoffee
     */
    public function createItem(Coffee $coffee): OrderCoffee
    {
        $item = new OrderCoffee();
        $item->setCoffee($coffee);
        $item->setQuantity(1);

        return $item;
    }
}