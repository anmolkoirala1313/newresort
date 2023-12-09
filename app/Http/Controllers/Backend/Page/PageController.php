<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Requests\Backend\PageRequest;
use App\Models\Backend\Page\Page;
use App\Services\PageService;
use App\Traits\ControllerOps;
use App\Traits\Status;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PageController extends BackendBaseController
{
    use ControllerOps, Status;
    protected string $module        = 'backend.';
    protected string $base_route    = 'backend.page.';
    protected string $view_path     = 'backend.page.';
    protected string $page          = 'Page';
    protected string $folder_name   = 'page';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;
    private PageService $pageService;

    public function __construct(PageService $pageService)
    {
        $this->model            = new Page();
        $this->pageService      = $pageService;
        $this->image_path       = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }

    public function getDataForDataTable(Request $request): JsonResponse
    {
        return $this->pageService->getDataForDatatable($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PageRequest $request
     * @return JsonResponse
     */
    public function store(PageRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['key' => $this->model->changeTokey($request['title'])]);
            $request->request->add(['created_by' => auth()->user()->id ]);
            $request->request->add(['status' => true ]);

            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'1920','765');
                $request->request->add(['image'=>$image_name]);
            }

            $page = $this->model->create($request->all());
            $this->pageService->syncSections($request, $page);
            Session::flash('success',$this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.'  was not created. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function edit($id)
    {
        $this->page_method          = 'edit';
        $this->page_title           = 'Edit '.$this->page;
        $data                       = [];
        $data['row']                = $this->model->find($id);
        $data['section_slug']       = $data['row']->pageSections->pluck('slug')->toArray();
        $data['section_position']   = $data['row']->pageSections->whereNotNull('list_number_1')->pluck('list_number_1','slug')->toArray();
        $data['list_number_2']      = $data['row']->pageSections->whereNotNull('list_number_2')->pluck('list_number_2','slug')->toArray();
        $data['gallery']            = $data['row']->pageSections->where('slug','gallery')->first();

        return view($this->loadResource($this->view_path.'edit'), compact('data'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param PageRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(PageRequest $request, $id)
    {
        $data['row']       = $this->model->find($id);
        DB::beginTransaction();
        try {
            if($request->hasFile('image_input')){
                $image_name = $this->updateImage($request->file('image_input'),$data['row']->image,'1920','765');
                $request->request->add(['image'=>$image_name]);
            }
            $request->request->add(['updated_by' => auth()->user()->id ]);
            $request->request->add(['created_by' => auth()->user()->id ]);
            $request->request->add(['page_id' => $id]);
            $data['row']->update($request->all());

            $section_slug_database  = $data['row']->pageSections->pluck('slug')->toArray();
            $this->pageService->syncSections($request, $data['row'],$section_slug_database);

            Session::flash('success',$this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error',$this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->base_route.'index'));
    }

}
