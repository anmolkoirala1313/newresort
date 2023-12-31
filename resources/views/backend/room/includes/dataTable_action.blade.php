<div class="row">
    <div class="hstack gap-2">
            <a href="{{ route('frontend.room.show', $params['slug']) }}" title="View in frontend" target="_blank"
               class="btn btn-outline-info waves-effect waves-light"><i class="ri-eye-line"></i></a>
        <a href="{{ route($params['base_route'].'gallery',$params['slug']) }}" title="Add Gallery Images"
           class="btn btn-outline-primary waves-effect waves-light"><i class="ri-image-2-fill"></i></a>
        <a href="{{ route($params['base_route'].'edit',$params['id']) }}" title="Edit"
           class="btn btn-outline-success waves-effect waves-light"><i class="ri-pencil-fill"></i></a>
        <button class="btn btn-outline-danger waves-effect waves-light cs-remove-data" title="Remove"
                cs-delete-route="{{ route($params['base_route'].'destroy',$params['id']) }}" data-value="{{$params['id']}}">
            <i class="ri-delete-bin-6-line"></i></button>
    </div>
</div>
