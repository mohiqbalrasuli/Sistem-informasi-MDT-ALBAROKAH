<?php

namespace App\Http\Controllers;

use App\Models\PengajarModel;
use App\Models\strukturalModel;
use Illuminate\Http\Request;

class StrukturalController extends Controller
{
    public function index()
    {
        $struktural = strukturalModel::with('pengajar')->get();
        return view('struktural.struktural',compact('struktural'));
    }
    public function create()
    {
        $pengajar = PengajarModel::all();
        return view('struktural.create_struktural',compact('pengajar'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'pengajar_id'=>'required',
            'jabatan'=>'required|string|max:255'
        ]);
        strukturalModel::create([
            'pengajar_id'=>$request->pengajar_id,
            'jabatan'=>$request->jabatan
        ]);
        return redirect('/data-struktural')->with('swal_success','Data berhasil di tambahkan!');
    }
    public function edit($id)
    {
        $struktural = strukturalModel::findOrFail($id);
        $pengajar = PengajarModel::all();
        return view('struktural.update_struktural',compact('struktural','pengajar'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'pengajar_id'=>'required',
            'jabatan'=>'required|string|max:255'
            ]);
        $struktural = strukturalModel::findOrFail($id);
        $struktural->pengajar_id = $request->pengajar_id;
        $struktural->jabatan=$request->jabatan;
        $struktural->save();
        return redirect('/data-struktural')->with('swal_success','Data berhasil di update!');
    }
    public function destroy($id)
    {
        $struktural = strukturalModel::findOrFail($id);
        $struktural->delete();
        return redirect('/data-struktural')->with('swal_success','Data berhasil di hapus!');
    }
}
