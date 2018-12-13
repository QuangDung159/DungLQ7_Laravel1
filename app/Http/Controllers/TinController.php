<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tin;

class TinController extends Controller
{
    //
    public function index()
    {
        $tin = Tin::paginate(5);
        return view("tin", ["tin" => $tin]);
    }
}
