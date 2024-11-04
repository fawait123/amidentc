<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        // Hook before creating
        static::creating(function ($model) {
            // Logic to perform before creating the model
            $model->created_by = Auth::user()->name; // Example of setting a default value
        });

    }
}
