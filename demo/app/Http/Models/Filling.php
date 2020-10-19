<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Filling extends Model
{
    protected $table = 'filling';
    protected $fillable = [
        'name',
        'price',
        'img'
    ];
    public $timestamps = false;
}
