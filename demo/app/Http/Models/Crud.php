<?php

namespace App\Http\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;


class Crud extends Model
{
    public $ColumnName;
    public $BodyTable;
    public static $a;
    public $RouteName
;
    public function __construct(string $tableName , array $arr = NULL , $RouteName)
    {
        self::$a=$tableName;
        $this->RouteName=$RouteName;
        $ColumnListing=Schema::getColumnListing($tableName);
        $this->BodyTable=CrudConnect::all();
            if ($arr == NULL) {
                $this->ColumnName = $ColumnListing;
            } else {
                if (count(array_intersect($arr, $ColumnListing)) == count($arr)) {
                    $this->ColumnName = $arr;
                } else {
                    throw new Exception('Неверные columnName');
                }
            }

    }

}
