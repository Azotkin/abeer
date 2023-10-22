<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Test;
use Illuminate\Http\Request;
use App\Models\product;
class productController extends Controller
{
    public function store(Request $request)
    {

        $valid= $request->validate([
            'productName' => 'required|min:4|max:20',
            'description'=>'required|min:10|max:100',
            'price'=>'required|max:3',
            'category'=>'required',
            'imagePath'=>'required'

        ]);
        $model = new product();

        $model->product_name=$request->input('productName');
        $model->image_path=$request->input('imagePath');
        $model->description=$request->input('description');
        $model->price=$request->input('price');
        $model->category=$request->input('category');
        $model->save();
        return 'Запись добавлена';
    }


    public function index(){
        $itemList= product::orderBy('created_at','desc')->get();
        return $itemList;
    }
}
