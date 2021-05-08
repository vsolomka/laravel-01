<?php

namespace App\Http\Controllers;

use App\Models\Queries\PaidOrders;
use App\Models\Queries\OrdersByCustomer;
use App\Models\Queries\AmountsForCustomers;
use Illuminate\Support\Facades\DB;


class QueriesController extends Controller
{
    public function getOrdersByCustomer(int $id = 0)
    {
        $data = new OrdersByCustomer($id);

        return view(
            'dbtable',
            [
                "data" => $data->get(),
                "header" => "Выборку всех заказов по одному из контрагентов (" . $id . ")",
            ]
        );
    }

    public function getAmountsForCustomers()
    {
        $data = new AmountsForCustomers();

        return $data->get();
        return view(
            'dbtable',
            [
                "data" => $data->get(),
                "header" => "Выборка по сумме всех заказов на контрагентов",
            ]
        );
    }

    public function getPaidOrders()
    {
        $data = new PaidOrders();
        return view(
            'dbtable',
            [
                "data" => $data->get(),
                "header" => "Оплаченные заказы",
            ]
        );
    }

    public function getProducts()
    {
        return DB::table('products')->first();
//        return DB::select("SELECT * FROM products");
    }
}

