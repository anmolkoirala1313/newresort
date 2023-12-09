<?php

namespace App\Models\Backend;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class BackendBaseModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    public function createdBy(){
        return $this->hasOne(User::class,'created_by','id');
    }

    public function updatedBy(){
        return $this->hasOne(User::class,'updated_by','id');
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('status', 1);
    }

    public function scopeDescending(Builder $query): void
    {
        $query->orderBy('created_at', 'DESC');
    }

}
