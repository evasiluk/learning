<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function tags() {
        return $this->morphToMany('App\Tag', 'tagable');
    }

    public function watchable() {
        return $this->morphTo();
    }
}
