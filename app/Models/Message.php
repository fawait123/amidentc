<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Hook before creating
        static::creating(function ($model) {
            // Logic to perform before creating the model
            $model->user_id = Auth::guard('participant')->user()->id ?? 0; // Example of setting a default value
        });
    }
}
