<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class orderController extends Controller
{
    public function index(Request $request)
    {
        $valid = $request->validate([
            'phoneNumber' => 'required|min:10|max:11',
            'address'=>'required|min:3|max:40'
        ]);
        $model = new Order();
        $model->phone_number = (int)$request->input('phoneNumber');
        $model->user_id = '000000';
        $model->products = $request->input('order');
        $model->payment_method = $request->input('payment_method');
        $model->order_status = true;
        $model->address=$request->input('address');
        if(!$model->save()){
            return 'Запись не добавлена';
        }
            return 'Запись добавлена';
    }

    public function store()
    {
        $itemList = Order::orderBy('created_at', 'desc')->get();
        return $itemList;
    }

    public function takeOrder(Request $request){
        $model = new Order();
        Order::where('id', $request->input('id'))->update([
            "order_status"=>$request->input('order_status')
        ]);
        return "Заказ принят в работу";
    }


}
