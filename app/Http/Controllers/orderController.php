<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class orderController extends Controller
{
    public function store(Request $request){


        $valid=$request->validate([
            'phoneNumber'=>'required|min:11|max:11'
        ]);


        $order=json_decode( $request->input('order'), true);

                $model= new Order();
                $model->phone_number=(int)$request->input('phoneNumber');
                $model->user_id='000000';
                $model->products=$request->input('order');
                $model->payment_method=$request->input('payment_method');
                $model->save();



        return 'Запись добавлена';
    }

    public function totalPrice(Request  $request){
        $count = $request->input('count');
        $id = $request->input('id');
            return 'запрос дошел, спасибо!';
    }
}
