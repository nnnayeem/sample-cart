<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FrontController extends Controller
{
    public function products()
    {
        $products = Product::paginate(10);

        return Response::success('Product fetched successfully', new ProductResource($products));
    }
}
