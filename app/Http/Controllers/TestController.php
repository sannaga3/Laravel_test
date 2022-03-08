<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Test;

class TestController extends Controller
{
    public function index()
    {
        // $tests = Test::all();
        $tests = DB::table('tests')
        ->select('id', 'text')
        ->orderByRaw('id DESC')
        ->get();
        // dd($tests);

        return view('tests.test', ['tests' => $tests]);
        // return view('tests.test', compact('tests'));
    }
}