<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class Post
 *
 * @property $id
 * @property $title
 * @property $content
 * @property $created_by
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Post extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title', 'content', 'created_by'];


    /**
     * The "booting" method of the model.
     *
     * This method is used to define model events. In this case, it hooks into the
     * "creating" event to automatically set the 'created_by' attribute to the
     * name of the currently authenticated user before a new Post model is created.
     */
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
