<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    public function store(Request $request)
    {
        $valid = $request->validate([
            'productName' => 'required|min:4|max:20',
            'description' => 'required|min:10|max:100',
            'price' => 'required|max:3',
            'category' => 'required',
            'imagePath' => 'required'
        ]);
        $model = new product();
        $model->product_name = $request->input('productName');
        $model->image_path = $request->input('imagePath');
        $model->description = $request->input('description');
        $model->price = $request->input('price');
        $model->category = $request->input('category');
        $model->save();
        return 'Запись добавлена';
    }


    public function index()
    {
        $itemList = product::orderBy('created_at', 'desc')->get();
        return $itemList;
    }

    public function upLoad(Request $request)
    {
        $path = Storage::putFile('public', $request->file('file'));
        return $path;
    }
    public function deleteItem(Request $request){

        $model = product::find($request->input('id'));
        $model->delete();
        return "Удалено";
    }
    public function change(Request $request)
    {
        $model = new product();
            product::where('id', $request->input('id'))
                ->update([
                    'product_name'=>$request->input('product_name'),
                    'description'=>$request->input('description'),
                    'price'=>$request->input('price'),
                    'category'=>$request->input('category'),

                    ]);
                return "все ок";
    }
}
