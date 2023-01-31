<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Models\DeliveryCompany;
use App\Models\Order;
use App\Models\Source;
use App\Models\StatusOrder;
use Tests\TestCase;

class OrderUnitTest extends TestCase
{
    protected $order;

    public function setUp(): void
    {
        parent::setUp();
        $this->order = Order::factory()->create();
    }


    /** @test */
    function an_order_belongs_to_Client()
    {
        $this->assertInstanceOf(Client::class, $this->order->client);
    }

    /** @test */
    function an_order_belongs_to_Source()
    {
        $this->assertInstanceOf(Source::class, $this->order->source);
    }

    /** @test */
    function an_order_belongs_to_DeliveryCompany()
    {
        $this->assertInstanceOf(DeliveryCompany::class, $this->order->DeliveryCompany);
    }

    /** @test */
    function an_order_belongs_to_StatusOrder()
    {
        $this->assertInstanceOf(StatusOrder::class, $this->order->StatusOrder);
    }
}
