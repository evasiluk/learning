<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public function videos() {
        return $this->morphMany('App\Video', 'watchable');
    }
}
