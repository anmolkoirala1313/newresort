<?php

namespace App\Http\Controllers\Frontend\Service;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Models\Backend\Service;
use App\Models\Backend\Setting;
use App\Traits\FrontendSearch;
use Illuminate\Contracts\Support\Renderable;

class ServiceController extends BackendBaseController
{
    use FrontendSearch;
    protected string $module        = 'frontend.';
    protected string $base_route    = 'frontend.service.';
    protected string $view_path     = 'frontend.service.';
    protected string $page          = 'Service';
    protected string $folder_name   = 'Service';
    protected string $page_title, $page_method, $image_path;
    protected object $model;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model                = new Service();
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
        $data['latest']         = $this->model->active()->descending()->limit(6)->get();
        $data['setting']        = Setting::first();
        return $data;
    }


    public function show($slug)
    {
        $this->page_method      = 'show';
        $this->page_title       = $this->page.' Details';
        $data                   = $this->getCommonData();
        $data['row']            = $this->model->where('key',$slug)->first();

        if(!$data['row']){
            abort(404);
        }

        return view($this->loadResource($this->view_path.'show'), compact('data'));
    }
}
