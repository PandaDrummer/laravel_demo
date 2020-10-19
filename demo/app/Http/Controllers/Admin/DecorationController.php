<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Crud;
use App\Http\Models\Decoration;
use App\Http\Models\ImageUpload;
use Illuminate\Http\Request;

class DecorationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $routeName =$request->route()->getName();
        $crud= new Crud('decoration',[],$routeName);
        return view('decoration.index', [
            'crud'=>$crud
        ] );
    }


    public function create()
    {
        return view('decoration.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required'
        ]);
        $shape = new Decoration([
            'name' => $request->get('name'),
            'price' => $request->get('price')
        ]);
        $shape->save();
        return redirect()->route('decoration');
    }

    public function show($id)
    {
        $decoration = Decoration::find($id);
        return view('decoration.show',[
            'decoration'=>$decoration
        ]);
    }


    public function edit($id)
    {
        $decoration = Decoration::find($id);
        return view('decoration.update',[
            'decoration'=>$decoration
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required'
        ]);

        $decoration = Decoration::find($id);
        $decoration->name= $request->get('name');
        $decoration->price= $request->get('price');
        $decoration->save();
        return redirect()->route('decoration');
    }

    public function destroy($id)
    {
        $decoration= Decoration::find($id);
        unlink(public_path('uploads/' . $decoration->img));
        $decoration->delete();
        return redirect()->route('decoration');
    }
    public function imageUpload($id)
    {
        return view('decoration.imageUpload',[
            'id'=>$id
        ]);
    }
    public function imageUploadPost(Request $request , $id)
    {
        $decoration = Decoration::find($id);
        $upload = new ImageUpload();
        $decoration->img=$upload->uploadFile($request->file('image') , $decoration->img);
        $decoration->save();
        return redirect()->route('decoration.show', $id);
    }
}
