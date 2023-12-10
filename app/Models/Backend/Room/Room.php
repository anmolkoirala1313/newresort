<?php

namespace App\Models\Backend\Room;

use App\Models\Backend\BackendBaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends BackendBaseModel
{
    use HasFactory, SoftDeletes, Sluggable, Slug;

    protected $table    ='rooms';
    protected $fillable = ['id','title','subtitle','slug','price','description','image','cover','video','meta_title','meta_tags','meta_description','status','created_by','updated_by'];

    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(Amenity::class,'amenity_rooms','room_id','amenity_id');
    }

    public function roomGalleries()
    {
        return $this->hasMany(RoomGallery::class);
    }
}
