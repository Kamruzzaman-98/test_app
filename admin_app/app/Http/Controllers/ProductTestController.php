<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductTestController extends Controller
{
    public function withoutIndex()
    {
        $start = microtime(true);

        $product = Product::where('sku', 'SKU-12450')->first();

        $end = microtime(true);

        return [
            'time' => $end - $start,
            'data' => $product
        ];
    }

    public function withIndex()
    {
        $start = microtime(true);

        $product = Product::where('sku', 'SKU-12450')->first();

        $end = microtime(true);

        return [
            'time' => $end - $start,
            'data' => $product
        ];
    }
}
