<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Crud;
use App\Http\Models\ImageUpload;
use App\Http\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $routeName =$request->route()->getName();
        $crud= new Crud('products',['id','name','price'],$routeName);
        return view('product.index', [
            'crud'=>$crud
        ] );
    }
    public function show($id){
        $product= Product::find($id);
        return view('product.show',[
            'product'=>$product
        ]);
    }
    public function create(){

        return view('product.create',[

        ]);
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.update',[
            'product'=>$product
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);

        $product = Product::find($id);
        $product->name= $request->get('name');
        $product->description= $request->get('description');
        $product->price= $request->get('price');
        $product->img= $request->get('img');
        $product->save();
        return redirect()->route('product');
    }
    public function destroy($id)
    {
        $product= Product::find($id);
        unlink(public_path('uploads/' . $product->img));
        $product->delete();
        return redirect()->route('product');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);

        $contact = new Product([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price')
        ]);
        $contact->save();
        return redirect()->route('product');
    }
    public function imageUpload($id)
    {
        return view('product.imageUpload',[
            'id'=>$id
        ]);
    }
    public function imageUploadPost(Request $request , $id)
    {
        $product = Product::find($id);
        $upload = new ImageUpload();
        $product->img=$upload->uploadFile($request->file('image') , $product->img);
        $product->save();
        return redirect()->route('product.show', $id);
    }
}
