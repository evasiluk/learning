<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function videos() {
        return $this->morphedByMany('App\Video', 'tagable');
    }

    public function posts() {
        return $this->morphedByMany('App\Post', 'tagable');
    }
}
