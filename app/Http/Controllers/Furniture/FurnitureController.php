<?php

namespace App\Http\Controllers\Furniture;

use App\Http\Controllers\Controller;
use App\Http\Requests\Furniture\IndexFurnitureRequest;
use App\Http\Resources\Furniture\FurnitureResource;
use App\Models\Furniture\Furniture;
use App\Services\Furniture\FurnitureFilter;

class FurnitureController extends Controller
{
    public function index(IndexFurnitureRequest $request)
    {
        $builder = app(FurnitureFilter::class)
            ->setBuilder(Furniture::query())
            ->setValues($request->get('search', []))
            ->run();

        return FurnitureResource::collection($builder->paginate());
    }
}
