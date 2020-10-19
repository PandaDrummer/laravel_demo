<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Shape extends Model
{
    protected $table = 'shape';
    protected $fillable = [
        'name',
        'description',
        'price',
        'img'
    ];
    public $timestamps = false;
}
