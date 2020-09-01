<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function __invoke()
    {
        // jika ada invoke method di controller maka controller itu hanya bisa menampilkan 1 view, yaitu view yang ada di mehtod invoke ini
        //

        $name = request('name');
        $context = [
            'name'=>$name
        ];
        return view('home', $context);
    }
}
