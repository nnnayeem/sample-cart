<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\ProductFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FrontController extends Controller
{
    public function products()
    {
        $products = Product::filter(new ProductFilter())->paginate(10);

        return Response::success('Product fetched successfully', ProductResource::collection($products)->response()->getData());
    }
}
