<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Decoration extends Model
{
    protected $table = 'decoration';
    protected $fillable = [
        'name',
        'price',
        'img'
    ];
    public $timestamps = false;
}
