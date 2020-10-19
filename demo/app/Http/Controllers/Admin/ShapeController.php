<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Crud;
use App\Http\Models\ImageUpload;
use App\Http\Models\Shape;
use Illuminate\Http\Request;

class ShapeController extends Controller
{
    public function index(Request $request)
    {
        $routeName =$request->route()->getName();
        $crud= new Crud('shape',['id','name','description','price'],$routeName);
        return view('shape.index', [
            'crud'=>$crud
        ] );
    }

    public function create()
    {
        return view('shape.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);

        $shape = new Shape([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price')
        ]);
        $shape->save();
        return redirect()->route('shape');
    }

    public function show($id)
    {
        $shape = Shape::find($id);
        return view('shape.show',[
            'shape'=>$shape
        ]);
    }


    public function edit($id)
    {
        $shape = Shape::find($id);
        return view('shape.update',[
            'shape'=>$shape
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);

        $shape = Shape::find($id);
        $shape->name= $request->get('name');
        $shape->description= $request->get('description');
        $shape->price= $request->get('price');
        $shape->save();
        return redirect()->route('shape');
    }

    public function destroy($id)
    {
        $shape= Shape::find($id);
        unlink(public_path('uploads/' . $shape->img));
        $shape->delete();
        return redirect()->route('shape');
    }
    public function imageUpload($id)
    {
        return view('shape.imageUpload',[
            'id'=>$id
        ]);
    }
    public function imageUploadPost(Request $request , $id)
    {
        $shape = Shape::find($id);
        $upload = new ImageUpload();
        $shape->img=$upload->uploadFile($request->file('image') , $shape->img);
        $shape->save();
        return redirect()->route('shape.show', $id);
    }
}
