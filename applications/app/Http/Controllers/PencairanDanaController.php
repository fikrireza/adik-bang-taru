<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PencairanDanaController extends Controller
{
    public function index()
    {
      return view('pencairan-dana.index');
    }

    public function proses()
    {
      return view('pencairan-dana.proses');
    }

    public function rincian()
    {
      return view('pencairan-dana.rincian');
    }

    public function pencairan()
    {
      return view('pencairan-dana.pencairan');
    }
}
