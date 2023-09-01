<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    // public function rooms(){
    //     return $this->hasMany(Task::class,'status_id');
    // }

    // this will automatically insert updated_by and created_by in db
    public static function boot()
    {
       parent::boot();
       static::creating(function($model)
       {
           $model->created_by = auth()->id();
           $model->updated_by = auth()->id();
       });
       static::updating(function($model)
       {
           $model->updated_by = auth()->id();
       });
   }
}
