<?php

namespace App\Http\Controllers;

use App\Models\MuridBaruModel;
use App\Models\WaktuPMBModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PMBController extends Controller
{
    public function index()
    {
        $muridbaru = MuridBaruModel::all();
        return view('PMB.murid-baru', compact('muridbaru'));
    }
    public function edit()
    {
        return view('PMB.update_murid_baru');
    }
    public function landingPMB()
    {
        $data = WaktuPMBModel::first(); // atau Profile / Setting

        $hariIni = now();

        if ($hariIni->between(Carbon::parse($data->tanggal_mulai), Carbon::parse($data->tanggal_selesai))) {
            $status = "DIBUKA";
        }else{
            $status = "BELUM DI BUKA";
        }
        return view('landing.pmb.pmb',compact('status'));
    }
    public function form()
    {
        $data = WaktuPMBModel::first();

        $hariIni = now();

        if ($hariIni->between(Carbon::parse($data->tanggal_mulai), Carbon::parse($data->tanggal_selesai))) {
            return view('landing.pmb.form', compact('data'));
        }else{
            return view('landing.pmb.belumdibuka', compact('data'));
        }

    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',

            // FILE
            'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'akta' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kk' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',

            // ORANG TUA
            'nama_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
        ]);
        // ================= SIMPAN KE DB =================
        $data = [
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'foto' => $request->foto,
            'akta' => $request->akta,
            'kk' => $request->kk,
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'no_telp' => $request->no_telp,
        ];
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('murid/foto', 'public');
            $data['foto'] = $path;
        }

        if ($request->hasFile('akta')) {
            $path = $request->file('akta')->store('murid/akta', 'public');
            $data['akta'] = $path;
        }

        if ($request->hasFile('kk')) {
            $path = $request->file('kk')->store('murid/kk', 'public');
            $data['kk'] = $path;
        }

        MuridBaruModel::create($data);

        return redirect()->back()->with('swal_success', 'Berhasil Mendaftar!');
    }
}
