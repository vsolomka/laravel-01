<?php

namespace Tests\Feature;

use App\Http\Controllers\DBTableController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QueriesControllerTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTables()
    {

        $obj = new DBTableController();
        $response = $obj->display('products');
        $fields = array_keys(get_object_vars($response[0]));

        $this->assertEquals($fields, ["Id", "SKU", "Title", "Description", "AvailableQuantity", "Price"]);
    }

    public function testQueriesOrders()
    {
        $response = $this->get('/query/orders-by-customer/1');
        $response->assertStatus(200);
        $response->assertViewHasAll([
            'data',
            'header'
        ]);

    }

    public function testQueriesPaid()
    {
        $response = $this->get('/query/paid-orders');
        $response->assertStatus(200);
        $response->assertSee('Оплаченные заказы');
    }

    public function testQueriesAmounts()
    {
        $response = $this->get('/query/amounts-for-customers-json');
        $response->assertStatus(200);
        $response->assertSeeInOrder(['Id', 'Name', 'Amount']);
    }
}
