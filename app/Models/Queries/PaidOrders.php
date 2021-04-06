<?php

namespace App\Models\Queries;

class PaidOrders extends Query
{
    public function __construct()
    {
        $this->sql = <<<SQL
SELECT * FROM orders INNER JOIN payments ON orderId = orders.Id;
SQL;
    }
}
