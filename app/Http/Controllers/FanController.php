<?php

namespace App\Http\Controllers;

use App\Models\FanModel;
use App\Models\PengajarModel;
use Illuminate\Http\Request;

class FanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->kelas) {
            $fan = FanModel::where('kelas', $request->kelas)->get();
        } else {
            $fan = FanModel::with('pengajar')->get();
        }
        return view('fan.fan', compact('fan'));
    }
    public function create()
    {
        $pengajar = PengajarModel::all();
        return view('fan.create_fan', compact('pengajar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fan' => 'required|string|max:255',
            'nama_kitab' => 'required|string|max:255',
            'kelas' => 'required|in:shifir_a,shifir_b,kelas_1,kelas_2,kelas_3,kelas_4',
            'pengajar_id' => 'required',
        ]);
        FanModel::create([
            'nama_fan' => $request->nama_fan,
            'nama_kitab' => $request->nama_kitab,
            'kelas' => $request->kelas,
            'pengajar_id' => $request->pengajar_id,
        ]);
        return redirect('/data-fan')->with('swal_success', 'Data Fan Berhasil di Tambahkan!');
    }
    public function edit($id)
    {
        $fan = FanModel::findOrFail($id);
        $pengajar = PengajarModel::all();
        return view('fan.update_fan', compact('fan', 'pengajar'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_fan' => 'required|string|max:255',
            'nama_kitab' => 'required|string|max:255',
            'kelas' => 'required|in:shifir_a,shifir_b,kelas_1,kelas_2,kelas_3,kelas_4',
            'pengajar_id' => 'required',
        ]);
        $fan = FanModel::findOrFail($id);
        $fan->nama_fan = $request->nama_fan;
        $fan->nama_kitab = $request->nama_kitab;
        $fan->kelas = $request->kelas;
        $fan->pengajar_id = $request->pengajar_id;
        $fan->save();
        return redirect('/data-fan')->with('swal_success', 'Data Fan Berhasil di Update! ');
    }
    public function destroy($id)
    {
        $fan = FanModel::findOrFail($id);
        $fan->delete();
        return redirect()->back()->with('swal_success', 'Data Fan Berhasil di Hapus');
    }
}
