<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Отключение защиты от массового заполнения
    protected $fillable = ['name', 'description', 'author_id'];

    /**
     * Определение обратного отношения
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\Models\Author', 'author_id');
    }

    /**
     * Определение отношения «многие ко многим»
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function publishing_houses() {
        return $this->belongsToMany('App\Models\PublishingHouse', 'book_publishing_houses', 'publishing_house_id', 'book_id');
    }
}
