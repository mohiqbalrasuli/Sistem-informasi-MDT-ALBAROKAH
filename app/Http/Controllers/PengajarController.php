<?php

namespace App\Http\Controllers;

use App\Models\PengajarModel;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    public function index()
    {
        $pengajar = PengajarModel::all();
        return view('pengajar.pengajar',compact('pengajar'));
    }
}
