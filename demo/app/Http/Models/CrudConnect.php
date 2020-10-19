<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class CrudConnect extends Model
{
    protected $table ;
    public function __construct()
    {
        $this->table = Crud::$a;
    }


}
