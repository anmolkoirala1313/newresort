<?php

namespace App\Http\Controllers\Frontend\Room;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Models\Backend\Activity\PackageCategory;
use App\Models\Backend\Activity\PackageRibbon;
use App\Models\Backend\Activity\Package;
use App\Models\Backend\Room\Amenity;
use App\Models\Backend\Room\Room;
use App\Services\Frontend\RoomSearchService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class RoomController extends BackendBaseController
{
    protected string $module        = 'frontend.';
    protected string $base_route    = 'frontend.room.';
    protected string $view_path     = 'frontend.room.';
    protected string $page          = 'Room';
    protected string $folder_name   = 'room';
    protected string $page_title, $page_method, $image_path;
    protected object $model;
    private RoomSearchService $packageSearchService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RoomSearchService $packageSearchService)
    {
        $this->model                = new Room();
        $this->image_path           = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'package');
        $this->packageSearchService = $packageSearchService;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $this->page_method      = 'index';
        $this->page_title       = 'All '.$this->page;
        $data                   = $this->getCommonData();
        $data['rows']           = $this->model->active()->descending()->paginate(6);
        if(!$data['rows']){
            abort(404);
        }
        return view($this->loadResource($this->view_path.'index'), compact('data'));
    }


    public function getCommonData(): array
    {
        $data['amenities']    = Amenity::active()->descending()->has('rooms')->withCount('rooms')->having('rooms_count', '>', 0)->take(8)->get();
        $data['latest']        = Room::active()->descending()->take(5)->get();

        return $data;
    }


    public function search(Request $request)
    {
        $this->page_method      = 'search';
        $this->page_title       = 'Search '.$this->page;
        $data                   = $this->getCommonData();
        $data['rows']           = $this->packageSearchService->getSearchedRooms($request);

        return view($this->loadResource($this->view_path.'search'), compact('data'));
    }

    public function show($slug)
    {
        $this->page_method          = 'show';
        $this->page_title           = $this->page.' Details';
        $data                       = $this->getCommonData();
        $data['row']                = $this->model->where('slug',$slug)->first();

        if(!$data['row']){
            abort(404);
        }

        return view($this->loadResource($this->view_path.'show'), compact('data'));
    }

    public function amenities($slug)
    {

        try {
            $data                   = $this->getCommonData();
            $data['amenity']        = Amenity::where('slug',$slug)->active()->first();
            $this->page_method      = 'amenity';
            $this->page_title       = $data['amenity']->title;
            $data['rows']           = $data['amenity']->rooms()->active()->latest()->paginate(6);
        } catch (\Exception $e) {
            abort(404);
        }

        return view($this->loadResource($this->view_path.'amenity'), compact('data'));
    }

}
