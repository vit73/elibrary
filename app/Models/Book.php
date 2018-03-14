<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function author()
    {
        return $this->belongsTo('App\Models\Author');
    }

    public function publishing_houses() {
        return $this->belongsToMany('App\Models\PublishingHouse');
    }
}
