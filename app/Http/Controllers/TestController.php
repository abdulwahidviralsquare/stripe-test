<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TestController extends Controller
{
    public function Test(){

    }


    public function addCard(Request $req){
        dd($req->all());
    }
}
