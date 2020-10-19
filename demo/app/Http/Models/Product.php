<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 */
class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'img'
    ];
    public $timestamps = false;
}
