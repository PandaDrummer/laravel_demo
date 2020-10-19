<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Crud;
use App\Http\Models\Filling;
use App\Http\Models\ImageUpload;
use Illuminate\Http\Request;

class FillingController extends Controller
{

    public function index(Request $request)
    {
        $routeName =$request->route()->getName();
        $crud= new Crud('filling',['id','name','price'],$routeName);
        return view('filling.index', [
            'crud'=>$crud
        ] );
    }

    public function create()
    {
        return view('filling.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required'
        ]);

        $filling = new Filling([
            'name' => $request->get('name'),
            'price' => $request->get('price')
        ]);
        $filling->save();
        return redirect()->route('filling');
    }
    public function show($id)
    {
        $filling = Filling::find($id);
        return view('filling.show',[
            'filling'=>$filling
        ]);
    }


    public function edit($id)
    {
        $filling = Filling::find($id);
        return view('filling.update',[
            'filling'=>$filling
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required'
        ]);

        $filling = Filling::find($id);
        $filling->name= $request->get('name');
        $filling->price= $request->get('price');
        $filling->save();
        return redirect()->route('filling');
    }

    public function destroy($id)
    {
        $filling= Filling::find($id);
        unlink(public_path('uploads/' . $filling->img));
        $filling->delete();
        return redirect()->route('filling');
    }
    public function imageUpload($id)
    {
        return view('filling.imageUpload',[
            'id'=>$id
        ]);
    }
    public function imageUploadPost(Request $request , $id)
    {
        $filling = Filling::find($id);
        $upload = new ImageUpload();
        $filling->img=$upload->uploadFile($request->file('image') , $filling->img);
        $filling->save();
        return redirect()->route('filling.show', $id);
    }

}
