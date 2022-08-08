<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function __construct(private ProductService $service)
    {
    }
    public function index(Request $request, Brand $brand, CarModel $carModel)
    {
        $builder = Product::query();
        $builder = $this->service->productFilter($builder, $request, $brand->id, $carModel->id);

        return view('catalog', [
            'products' => $builder->paginate(),
            'brand' => $brand,
            'carModel' => $carModel
        ]);
    }
}
