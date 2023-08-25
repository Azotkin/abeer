<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $timeList= Lesson::orderBy('created_at','desc')->get();
        return $timeList;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid= $request->validate([
            'lessonName' => 'required|min:4|max:20',
            'date'=>'required|date',
            'classRoom'=>'required|max:3',
            'note'=>'required|min:4|max:50'
        ]);
        $model = new Test();

        $model->lesson_name=$request->input('lessonName');
        $model->class_number=$request->input('classRoom');
        $model->group_id=195;
        $model->datetime=$request->input('date');
            $model->info=$request->input('note');
        $model->save();
        return 'Запись добавлена';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(test $test)
    {
        //
    }
}
