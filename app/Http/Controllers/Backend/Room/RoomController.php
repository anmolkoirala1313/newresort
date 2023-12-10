<?php

namespace App\Http\Controllers\Backend\Room;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\Room\RoomRequest;
use App\Models\Backend\Room\Amenity;
use App\Models\Backend\Room\Room;
use App\Models\Backend\Room\RoomGallery;
use App\Services\RoomService;
use App\Traits\ControllerOps;
use App\Traits\Status;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;


class RoomController extends BackendBaseController
{
    use ControllerOps, Status;

    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.room.';
    protected string $view_path     = 'backend.room.';
    protected string $page          = 'Room';
    protected string $folder_name   = 'room';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;
    private RoomService $roomService;


    public function __construct(RoomService $roomService)
    {
        $this->model            = new Room();
        $this->roomService      = $roomService;
        $this->image_path       = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }

    public function getData(): array
    {
        $data['amenities'] = Amenity::active()->descending()->pluck('title','id');

        return $data;
    }

    public function getDataForDataTable(Request $request)
    {
        return $this->roomService->getDataForDatatable($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoomRequest $request
     * @return JsonResponse
     */
    public function store(RoomRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id ]);

            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'900','1200');
                $request->request->add(['image'=>$image_name]);
            }

            if($request->hasFile('cover_image')){
                $image_name = $this->uploadImage($request->file('cover_image'),'1920','1200');
                $request->request->add(['cover'=>$image_name]);
            }

            $room = $this->model->create($request->all());

            if($request->has('amenity_id')){
                $room->amenities()->sync($request->input('amenity_id'));
            }
            Session::flash('success',$this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            Session::flash('error',$this->page.'  was not created. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param RoomRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(RoomRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            $request->request->add(['updated_by' => auth()->user()->id ]);

            if($request->hasFile('image_input')){
                $image_name = $this->updateImage($request->file('image_input'),$data['row']->image,'900','1200');
                $request->request->add(['image'=>$image_name]);
            }
            if($request->hasFile('cover_image')){
                $image_name = $this->updateImage($request->file('cover_image'),$data['row']->cover,'1920','1200');
                $request->request->add(['cover'=>$image_name]);
            }

            $data['row']->update($request->all());
            $data['row']->amenities()->sync($request->input('amenity_id'));

            Session::flash('success',$this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }

    public function removeTrash(Request $request, $id)
    {
        $data['row']       = $this->model->withTrashed()->find($id);

        DB::beginTransaction();
        try {
            $this->deleteImage($data['row']->image);
            $this->deleteImage($data['row']->cover);
            $data['row']->forceDelete();

            Session::flash('success',$this->page.' was removed successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.' was not removed. Something went wrong.');
        }

        return redirect()->route($this->base_route.'trash');
    }


    public function gallery($key)
    {
        $this->page_method = 'gallery';
        $this->page_title  = 'Gallery list '.$this->page;
        $data              = [];
        $data['row']       = $this->model->where('key',$key)->first();

        return view($this->loadResource($this->view_path.'gallery'), compact('data'));
    }


    public function getGallery(Request $request,$id)
    {
        $images = RoomGallery::where('room_id',$id)->get()->toArray();
        $tableImages = [];
        if (count($images) > 0){
            foreach($images as $image){
                $tableImages[] = $image['resized_name'];
            }
            $storeFolder = public_path('storage/images/'.$this->folder_name.'/gallery/');
            $file_path = public_path('storage/images/'.$this->folder_name.'/gallery/');
            $files = scandir($storeFolder);
            foreach ( $files as $file ) {
                if ($file !='.' && $file !='..' && in_array($file,$tableImages)) {
                    $obj['name'] = $file;
                    $file_path = public_path('storage/images/'.$this->folder_name.'/gallery/').$file;
                    $obj['size'] = filesize($file_path);
                    $obj['path'] = url('/storage/images/'.$this->folder_name.'/gallery/'.$file);
                    $data[] = $obj;
                }
            }
//            dd($files,$tableImages);
            return response()->json($data);
        }
    }

    public function uploadGallery(Request $request,$id)
    {
        $room                 =  $this->model->find($id);
        if($room==null || $room=="null"){
            return redirect()->route($this->base_route.'gallery',$room->id);
        }

        $photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }


        if (!is_dir($this->image_path . '/'.$this->folder_name.'/gallery/')) {
            mkdir($this->image_path . '/'.$this->folder_name.'/gallery/', 0777);
        }


        for ($i = 0; $i < count($photos); $i++) {
            $photo          = $photos[$i];
            $name           = $room->slug."_".$this->folder_name."_gallery_".date('YmdHis') . uniqid();
            $save_name      = $name . '.' . $photo->getClientOriginalExtension();
            $resize_name    = "Thumb_".$name . '.' . $photo->getClientOriginalExtension();

            $image_save = Image::make($photo)
                ->orientate()
                ->save($this->image_path . '/'.$this->folder_name.'/gallery/' . $resize_name);



            $photo->move($this->image_path, $save_name);

            $upload = new RoomGallery();
            $upload->room_id         = $room->id;
            $upload->upload_by          = Auth::user()->id;
            $upload->filename           = $save_name;
            $upload->resized_name       = $resize_name;
            $upload->original_name      = basename(pathinfo($photo->getClientOriginalName(),PATHINFO_FILENAME));
            $upload->save();
        }

        return response()->json(['success'=>$save_name]);
    }

    public function deleteGallery(Request $request)
    {
        $resized_name = $request->get('filename');
        $uploaded_image = RoomGallery::where('resized_name', $resized_name)->first();

        if (empty($uploaded_image)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }

        $file_path = $this->image_path . '/'.$this->folder_name.'/gallery/' . $uploaded_image->filename;
        $resized_file = $this->image_path . '/'.$this->folder_name.'/gallery/' . $uploaded_image->resized_name;

        if (file_exists($file_path)) {
            @unlink($file_path);
        }

        if (file_exists($resized_file)) {
            @unlink($resized_file);
        }

        if (!empty($uploaded_image)) {
            $uploaded_image->delete();
        }

        return Response::json(['success' => $resized_name], 200);
    }

}
