<?php

namespace Tests\Feature;

use App\Http\Controllers\QueriesController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QueriesControllerTest extends TestCase
{
    protected $mock = [1, "test", "test", "test", 1, 1];
    protected $data = [1, "test", "test", "test", 1, 1];
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $client_mock = \Mockery::mock('overload:App\Models\Product');
        $client_mock->shouldReceive('create')->with($this->data);
//        ->andReturn($returnValue);

        $obj = new QueriesController();
        $response = $obj->getProducts();

//        $response = $this->get('/query/orders-by-customer/1');
//        var_dump($response);

        $this->assertEquals($response, $this->mock);
//        $response->assertStatus(200);
    }
}
