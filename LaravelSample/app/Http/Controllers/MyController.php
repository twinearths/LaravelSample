<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function insertdb() {
        DB::table('learning')->insertOrIgnore([
            ['id' => 1, 'content' => 'Today is Friday'],
            ['id' => 2, 'content' => 'Today is Saturday'],
        ]);
    }

    public function updatedb() {
        DB::table('learning')
              ->where('id', 1)
              ->update(['content' => 'Today is Sunday']);
    }

    public function deletedb() {
        $deleted = DB::table('learning')->where('id', 1)->delete();
    }


    public function deletealldb() {
        DB::table('learning')->truncate();
    }

    public function selectdb() {
        $learnings = DB::table('learning')
        ->select('id', 'content')
        ->get();
        dd($learnings);
    }
}
