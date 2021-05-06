<?php

namespace App\Http\Controllers;

use App\Models\Queries\PaidOrders;
use App\Models\Queries\OrdersByCustomer;
use App\Models\Queries\AmountsForCustomers;

/**
 * Class QueriesController
 * @package App\Http\Controllers
 *
 * @OA\Get(
 *     path="/query/paid-orders",
 *     summary="Orders that have been already paid (HTML)",
 *     tags={},
 *
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *     )
 * )
 * @OA\Get(
 *     path="/query/amounts-for-customers",
 *     summary="Amount per customer, for all customers (HTML)",
 *     tags={},
 *
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *     )
 * )
 * @OA\Get(
 *     path="/query/orders-by-customer/{id}",
 *     summary="Orders list for given customer (HTML)",
 *     @OA\Parameter(
 *         description="ID of customer",
 *         in="path",
 *         name="id",
 *         required=true,
 *         example="1"
 *     ),
 *     tags={},
 *
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *     )
 * )
 */

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
}

