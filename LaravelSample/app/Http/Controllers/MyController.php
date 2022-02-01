<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    //
    public function simpleScreen() {

        return view('simpleScreen');
    }

    public function send(Request $req) {
        $content = $req->content;
        $data = [ 'content'  => $content ];
        return view('receiveScreen', $data);
    }
}
