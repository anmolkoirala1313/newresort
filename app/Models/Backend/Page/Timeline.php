<?php

namespace App\Models\Backend\Page;

use App\Models\Backend\BackendBaseModel;
use App\Models\Backend\MenuItem;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timeline extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    ='timelines';
    protected $fillable =['id','heading','subheading','page_id','title','description','status','created_by','updated_by'];

    public function page()
    {
        return $this->belongsTo(Page::class,'page_id','id');
    }
}
