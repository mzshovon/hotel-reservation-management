<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    public static function boot()
    {
        parent::boot();
        static::creating(function($model) {
            $model->created_by = auth()->id();
            $model->updated_by = auth()->id();
        });
        static::updating(function($model) {
            $model->updated_by = auth()->id();
        });
    }
}
