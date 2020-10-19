<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    public $image;
    public function uploadFile($file , $currentImg){
        $baseName=pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        if($currentImg!= NULL){
            if(file_exists(public_path('uploads/') . $currentImg)){
                unlink(public_path('uploads/') . $currentImg) ;
            }
        }
        $uniqname= uniqid($baseName) . '.' . $file->getClientOriginalExtension() ;
        $file->move(public_path('uploads'),$uniqname);
        return $uniqname;
    }

}
