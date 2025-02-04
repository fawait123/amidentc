<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Quiz
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @property Question[] $questions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Quiz extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title', 'description'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(\App\Models\Question::class, 'quiz_id');
    }
}
