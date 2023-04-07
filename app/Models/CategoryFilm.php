<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CategoryFilm extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
      'category_id',
      'film_id',
    ];
}
