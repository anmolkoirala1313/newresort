@if($data['row'])
    {!! Form::model($data['row'], ['route' => [$base_route.'update',$data['row']->id ], 'method' => 'PUT','class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $base_route.'store', 'method'=>'POST', 'class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@endif

<div class="row mb-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    {!! Form::label('title', 'Website title', ['class' => 'form-label required']) !!}
                    {!! Form::text('title', null,['class'=>'form-control','id'=>'title','placeholder'=>'Enter title']) !!}
                </div>
                <div class="position-relative">
                    <div class="mb-3">
                        {!! Form::label('description', 'Website summary', ['class' => 'form-label']) !!}
                        {!! Form::textarea('description', null,['class'=>'form-control','max-length'=>'150','id'=>'description','placeholder'=>'Enter description']) !!}
                        <p class="text-muted mb-2">Recommended length: 150 characters</p>
                    </div>
                </div>
            </div>
        </div>

        @include($view_path.'includes.images')

        @include($view_path.'includes.meta_tabs')

        <div class="text-end mb-3">
            {!! Form::submit($data['row'] ? 'Update':'Create',['class'=>'btn btn-success mt-3','id'=>'add-button']) !!}
        </div>
    </div>
    <!-- end col -->


    <div class="col-lg-4">
        <div class="sticky-side-div">
           @include($view_path.'includes.address')

           @include($view_path.'includes.contact_number')

           @include($view_path.'includes.social_link')
        </div>
    </div>
</div>

{!! Form::close() !!}
