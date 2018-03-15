<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublishingHouse extends Model
{
    // Отключение защиты от массового заполнения
    protected $fillable = ['name', 'description'];

    /**
     * Определение отношения «многие ко многим»
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books(){
        return $this->belongsToMany('App\Models\Book', 'book_publishing_houses','book_id', 'publishing_house_id');
    }
}
