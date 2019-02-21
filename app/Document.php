<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Document extends Model
{
    public static function boot() {
        parent::boot();

        static::updating(function($document) {
            $users = array(3, 4, 5, 6);
            $random_key = array_rand($users, 1);
            $document->edit()->attach(User::find($users[$random_key]), [
                "before" => json_encode(array_intersect_key($document->fresh()->toArray(), $document->getDirty())),
                "after" => json_encode($document->getDirty())
            ]);
        });
    }

    public function edit() {
        return $this->belongsToMany('App\User')
            ->withTimestamps()
            ->withPivot(["before", "after"])
            ->latest('pivot_updated_at');
    }
}
