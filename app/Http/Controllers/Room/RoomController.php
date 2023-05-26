<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Http\Resources\Room\RoomResource;
use App\Models\Room\Room;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\Pure;

class RoomController extends Controller
{
    public function index()
    {
        return RoomResource::collection(Room::query()->paginate());
    }

    #[Pure] public function show(Room $room)
    {
        return new RoomResource($room);
    }
}
