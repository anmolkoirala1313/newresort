<?php

namespace App\Models\Backend\Room;

use App\Models\Backend\BackendBaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomGallery extends BackendBaseModel
{
    use HasFactory;

    protected $table    ='package_galleries';
    protected $fillable =['id','room_id','filename','resized_name','original_name','upload_by'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
