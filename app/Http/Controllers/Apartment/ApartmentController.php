<?php

namespace App\Http\Controllers\Apartment;

use App\Http\Controllers\Controller;
use App\Http\Resources\Apartment\ApartmentResource;
use App\Models\Apartment\Apartment;

class ApartmentController extends Controller
{
    public function index()
    {
        return ApartmentResource::collection(Apartment::query()->paginate());
    }

    public function show(Apartment $apartment)
    {
        return new ApartmentResource($apartment);
    }
}
