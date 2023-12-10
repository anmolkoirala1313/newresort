<?php

namespace App\Services;

use App\Models\Backend\Room\Room;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class RoomService {


    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.room.';
    protected string $view_path     = 'backend.room.';
    private DataTables $dataTables;
    private Room $model;

    public function __construct(DataTables $dataTables)
    {
        $this->model        = new Room();
        $this->dataTables = $dataTables;
    }

    public function getDataForDatatable(Request $request){

        $query = $this->model->query()
            ->orderBy('created_at', 'desc');
        return $this->dataTables->eloquent($query)
            ->editColumn('status',function ($item){
                $params = [
                    'id'            => $item->id,
                    'status'        => $item->status,
                    'base_route'    => $this->base_route,
                ];
                return view($this->module.'includes.status', compact('params'));
            })
            ->editColumn('action',function ($item){
                $params = [
                    'id'            => $item->id,
                    'slug'           => $item->slug,
                    'base_route'    => $this->base_route,
                ];
                return view($this->view_path.'.includes.dataTable_action', compact('params'));

            })
            ->rawColumns(['action','status'])
            ->addIndexColumn()
            ->make(true);
    }

}
