<?php

namespace App\Http\Controllers\Backend\Room;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\Room\AmenityRequest;
use App\Models\Backend\Room\Amenity;
use App\Traits\ControllerOps;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AmenityController extends BackendBaseController
{
    use ControllerOps;
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.room.basic_setup.amenity.';
    protected string $view_path     = 'backend.room.basic_setup.amenity.';
    protected string $page          = 'Amenities';
    protected string $folder_name   = 'amenity';
    protected string $page_title, $page_method, $image_path;
    protected object $model;


    public function __construct()
    {
        $this->model            = new Amenity();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param AmenityRequest $request
     * @return JsonResponse
     */
    public function store(AmenityRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id ]);
            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'150','150');
                $request->request->add(['image'=>$image_name]);
            }

            $this->model->create($request->all());
            Session::flash('success',$this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.'  was not created. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }



    public function update(AmenityRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            if($request->hasFile('image_input')){
                $image_name = $this->updateImage($request->file('image_input'),$data['row']->image,'150','150');
                $request->request->add(['image'=>$image_name]);
            }

            $request->request->add(['updated_by' => auth()->user()->id ]);
            $data['row']->update($request->all());

            Session::flash('success',$this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }

}
