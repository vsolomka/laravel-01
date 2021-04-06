<?php

namespace App\Models\Queries;

class AmountsForCustomers extends Query
{
    public function __construct()
    {
        $this->sql = <<<SQL
SELECT customers.Id,
       customers.Name,
       ROUND(SUM(orders.quantity * products.price)/100, 2) AS Amount
    FROM orders, products, customers
    WHERE orders.productId = products.Id
        AND orders.Id IN (SELECT orderId FROM payments)
        AND customers.Id = orders.customerId
    GROUP BY customers.Id, customers.Name
SQL;
    }
}
