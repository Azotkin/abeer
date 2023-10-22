<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class uploadImage extends Controller
{
    public function upLoad(Request $request)
    {

        $path = Storage::putFile('public', $request->file('file'));
        return $path;

    }
}
