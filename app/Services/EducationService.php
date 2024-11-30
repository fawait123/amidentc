<?php

namespace App\Services;

use App\Models\Post;

class EducationService
{

    public function __construct(
        protected Post $post
    ) {}

    public function data()
    {
        return $this->post->latest()->get();
    }
}
