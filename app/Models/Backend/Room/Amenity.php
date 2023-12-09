<?php

namespace App\Models\Backend\Room;

use App\Models\Backend\BackendBaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Amenity extends BackendBaseModel
{
    use HasFactory, SoftDeletes, Sluggable, Slug;

    protected $table    = 'amenities';
    protected $fillable = ['id','title','slug','image','status','created_by','updated_by'];

    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class,'amenity_rooms','amenity_id','room_id');
    }
}
