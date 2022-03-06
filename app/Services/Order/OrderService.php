<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderService
{
    public function checkout(array $form): Order|null
    {
        $products = $this->getProducts($form['products']);

        $totalPrice = $this->calculateTotal($products, $form['products']);

        $order = null;

        try{
            $order = DB::transaction(function () use($form, $totalPrice){
                $order = auth()->user()->orders()->create(
                    [
                        'total_price' => $totalPrice
                    ]
                );

                $order->orderItems()->createMany($form['products']);

                return $order;
            });
        }catch (\Exception $e)
        {
            Log::error($e);
        }

        return $order;
    }

    private function getProducts(array $formProducts):array
    {
        return array_map(function($item){
            return Product::findOrFail($item['product_id']);
        }, $formProducts);
    }

    private function calculateTotal(array $products, array $formProducts)
    {
        $totalPrice = 0;

        foreach ($formProducts as $key => $item)
        {
            $product = $products[$key];
            $totalPrice = $product->price*$item['quantity'] + $totalPrice;
        }

        return round($totalPrice, 2);
    }
}
