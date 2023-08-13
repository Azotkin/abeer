<?php

namespace App\Http\Controllers;


use App\Models\Student;
use Illuminate\Http\Request;

class   studentController extends Controller
{
    public function getValue(Request $request){
        $valid= $request->validate([
           'value' => 'required|min:4|max:10'
        ]);

        $test = new Student();

        $test->student_name = $request->input('value');
        $test->group_number = 'КДФ-210';

        $test->save();
        return redirect()->route('/test');
    }


}
