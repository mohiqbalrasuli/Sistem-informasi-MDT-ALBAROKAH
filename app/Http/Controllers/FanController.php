<?php

namespace App\Http\Controllers;

use App\Models\FanModel;
use App\Models\PengajarModel;
use Illuminate\Http\Request;

class FanController extends Controller
{
    public function index()
    {
        $fan = FanModel::with('pengajar')->get();
        return view('fan.fan',compact('fan'));
    }
    public function create()
    {
        $pengajar = PengajarModel::all();
        return view('pengajar.create_fan',compact('pengajar'));
    }
}
