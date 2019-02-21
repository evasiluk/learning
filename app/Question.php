<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['rubric', "question", "answer"];
//    protected $guarded = ['id'];

    public function comments() {
        return $this->hasMany('App\Comment', 'post_id');
    }
}
