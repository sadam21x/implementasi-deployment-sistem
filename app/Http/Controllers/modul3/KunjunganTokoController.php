<?php

namespace App\Http\Controllers\modul3;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class KunjunganTokoController extends Controller
{
    public function index()
    {
        return view('modul3/kunjungan-toko');
    }
}