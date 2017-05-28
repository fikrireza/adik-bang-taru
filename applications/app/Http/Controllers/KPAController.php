<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KPAController extends Controller
{
    public function index()
    {
      return view('kpa.index');
    }
}
