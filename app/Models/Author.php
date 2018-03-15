<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    // Отключение защиты от массового заполнения
    protected $fillable = ['name', 'surname', 'middlename'];

    /**
     * Определение отношения «один ко многим»
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }
}
