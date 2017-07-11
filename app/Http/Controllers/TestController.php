<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
//        $beatles = ['John', 'Paul', 'George', 'Ringo'];
//        alert()->overlay('Listen', 'I hear beatle music!', 'success');
//        return view('test.index', compact('beatles'));
        return view('test.index');
    }
}
