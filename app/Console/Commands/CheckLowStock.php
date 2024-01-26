<?php

namespace App\Console\Commands;

use App\Mail\LowStockEmail;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CheckLowStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-low-stock';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check low stock and send notifications';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::where('quantity', '<', 5)->get();

        foreach ($products as $product) {
            Mail::to('admin@example.com')->send(new LowStockEmail($product));
        }

        $this->info('Low stock check completed.');
    }
}
