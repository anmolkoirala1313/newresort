<?php

namespace App\Services\Frontend;

use App\Models\Backend\Room\Room;
use Illuminate\Http\Request;


class RoomSearchService {


    protected string $module        = 'frontend.';
    protected string $base_route    = 'frontend.room.';
    private Room $model;

    public function __construct()
    {
        $this->model        = new Room();
    }

    public function getSearchedRooms(Request $request){

        $data['all_rooms']   = $this->model->query();
        if($request['search']){
            $data['all_rooms']->where('title', 'LIKE', '%' . $request['search'] . '%');
        }

        session()->forget(['search']);

        return $data['all_rooms']->active()->descending()->get();
    }

}
