<?php

namespace app\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use PhpParser\Node\Expr\Cast\Array_;

class calendarController extends Controller
{


    private $simpleYear=365;
    private $visokYear=366;
    public function test(){
        $array=[];
     $monday='monday';
     $tuesday='tuesday';
     $wednesday='wednesday';
     $thursday='thursday';
     $friday='friday';
     $saturday='saturday';
     $sunday='sunday';
        for($i=1; $i<=5;$i++){
            array_push($array,$monday);
            array_push($array,$tuesday);
            array_push($array,$wednesday);
            array_push($array,$thursday);
            array_push($array,$friday);
            array_push($array,$saturday);
            array_push($array,$sunday);
        }
        for($q=count($array); $q<31;$q++){
            array_pop($array);
        }
return $array;
    }
        private function createMonth(){

        }

//    public function createCalendar(){
//        //дни недели
//        $arrayDay=[];
//        $monday=1;
//        $tuesday=2;
//        $wednesday=3;
//        $thursday=4;
//        $friday=5;
//        $saturday=6;
//        $sunday=7;
//
//        //месяца March, April, May, June, July, August, September, October, November, December
//        $january=31;
//        $february=28;
//        $march=31;
//        $april=30;
//        $may=31;
//        $june=30;
//        $july=31;
//        $august=31;
//        $september=30;
//        $october=31;
//        $november=30;
//        $december=31;
//
//    }
}
