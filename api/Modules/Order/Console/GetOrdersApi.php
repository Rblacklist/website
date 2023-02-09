<?php

namespace Modules\Order\Console;

use Illuminate\Console\Command;

class GetOrdersApi extends Command
{
    private $urlShopify = 'https://';
    private $urlYoucan = 'https://';
    private $urlWoocommerce = 'https://';
    private $urlprestashop = 'https://';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'module:get-orders-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get new orders from stores anding them to the database';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        return 'add New Orders';
    }

    private function addNewOrders($orders, $url)
    {
        $orders = getDataFromApi($url);
    }
}
