<?php

namespace App\Models\Queries;

class OrdersByCustomer extends Query
{
    public function __construct(int $id)
    {
        $this->sql = <<<SQL
SELECT  orders.Id,
        DATE(orders.createdAt) AS Date,
        products.Title,
        quantity,
        ROUND(products.price * .01, 2) AS Price,
        ROUND(Price * orders.quantity * .01, 2) AS Amount
    FROM orders
    RIGHT JOIN products
        ON productId = products.Id
    WHERE customerId = $id
SQL;
    }
}
