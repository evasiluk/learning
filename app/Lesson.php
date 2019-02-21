<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function scopeFilter($builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }
}
