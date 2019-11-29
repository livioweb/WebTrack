<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UrlController extends Controller
{

    public function __construct()
    {

    }


    public function getUrl(Request $request){

//        $url = $request->url;
//        if (filter_var($url, FILTER_VALIDATE_URL)) {
//            echo("$url is a valid URL");
//        } else {
//            echo("$url is not a valid URL");
//        }
////        $validatedData = $request->validate([
////            'url' => 'required|unique:posts|max:255',
////        ]);
///
        Log::info("Acessei a rota: ");
        return [$request->url];

    }

}
