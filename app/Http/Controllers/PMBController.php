<?php

namespace App\Http\Controllers;

use App\Models\MuridBaruModel;
use Illuminate\Http\Request;

class PMBController extends Controller
{
    public function index()
    {
        $muridbaru = MuridBaruModel::all();
        return view('PMB.murid-baru',compact('muridbaru'));
    }
    public function edit()
    {
        return view('PMB.update_murid_baru');
    }
}
