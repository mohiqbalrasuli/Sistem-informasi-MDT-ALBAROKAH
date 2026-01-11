<?php

namespace App\Http\Controllers;

use App\Models\MisiModel;
use App\Models\ProfileModel;
use App\Models\TujuanModel;
use App\Models\VisiModel;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = ProfileModel::first();
        $visi = VisiModel::all();
        $misi = MisiModel::all();
        $tujuan = TujuanModel::all();
        return view('profile.profile', compact('profile','visi','misi','tujuan'));
    }
    // visi start
    public function visiStore(Request $request)
    {
        $request->validate(['visi'=>'required|string|max:255']);
        VisiModel::create([
            'visi'=> $request->visi
        ]);
        return redirect()->back()->with('swal_success','Visi berhasil di tambahkan!');
    }
    public function visiUpdate(Request $request,$id)
    {
        $visi = VisiModel::findOrFail($id);
        $request->validate(['visi'=>'required|string|max:255']);
        $visi->visi = $request -> visi;
        $visi -> save();
        return redirect('/profile')->with('swal_success','Visi berhasil di update!');
    }
    public function visiDelete($id)
    {
        $visi = VisiModel::findOrFail($id);
        $visi->delete();
        return redirect()->back()->with('swal_success','Visi berhasil di hapus!');
    }
    // visi end

    //misi start
    public function misiStore(Request $request)
    {
        $request->validate(['misi'=>'required|string|max:255']);
        MisiModel::create([
            'misi'=> $request->misi
        ]);
        return redirect()->back()->with('swal_success','Visi berhasil di tambahkan!');
    }
    public function misiUpdate(Request $request,$id)
    {
        $misi = MisiModel::findOrFail($id);
        $request->validate(['misi'=>'required|string|max:255']);
        $misi->misi = $request -> misi;
        $misi -> save();
        return redirect('/profile')->with('swal_success','Misi berhasil di update!');
    }
    public function misiDelete($id)
    {
        $misi = MisiModel::findOrFail($id);
        $misi -> delete();
        return redirect()->back()->with('swal_success','Misi berhasil di hapus!');
    }
    // misi end

    // tujuan start
    public function tujuanStore(Request $request)
    {
        $request->validate(['tujuan'=>'required|string|max:255']);
        TujuanModel::create([
            'tujuan'=> $request->tujuan
        ]);
        return redirect()->back()->with('swal_success','Visi berhasil di tambahkan!');
    }
    public function tujuanUpdate(Request $request,$id)
    {
        $tujuan = TujuanModel::findOrFail($id);
        $request->validate(['tujuan'=>'required|string|max:255']);
        $tujuan->tujuan = $request -> tujuan;
        $tujuan -> save();
        return redirect('/profile')->with('swal_success','Tujuan berhasil di update!');
    }
    public function tujuanDelete($id)
    {
        $tujuan = TujuanModel::findOrFail($id);
        $tujuan -> delete();
         return redirect()->back()->with('swal_success','Tujuan berhasil di hapus!');
    }
    // tujuan end

    // Update profile
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim
        $request->validate([
            'nama_madrasah' => 'required|string|max:255',
            'tingkat' => 'nullable|string|max:50',
            'tahun_berdiri' => 'nullable|string|max:10',
            'alamat' => 'nullable|string|max:255',
            'desa' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kabupaten' => 'nullable|string|max:100',
            'provinsi' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|integer',
            'no_telp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'web' => 'nullable|string|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Ambil data profile berdasarkan ID
        $profile = ProfileModel::findOrFail($id);

        // Jika ada gambar baru, proses upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/profile/'), $filename);

            // Hapus gambar lama jika ada
            if ($profile->gambar && file_exists(public_path('uploads/profile/' . $profile->gambar))) {
                unlink(public_path('uploads/profile/' . $profile->gambar));
            }

            $profile->gambar = $filename; // update nama file
        }

        // Update field lainnya
        $profile->nama_madrasah = $request->nama_madrasah;
        $profile->tingkat = $request->tingkat;
        $profile->tahun_berdiri = $request->tahun_berdiri;
        $profile->alamat = $request->alamat;
        $profile->desa = $request->desa;
        $profile->kecamatan = $request->kecamatan;
        $profile->kabupaten = $request->kabupaten;
        $profile->provinsi = $request->provinsi;
        $profile->kode_pos = $request->kode_pos;
        $profile->no_telp = $request->no_telp;
        $profile->email = $request->email;
        $profile->web = $request->web;

        // Simpan perubahan
        $profile->save();

        return redirect('/profile')->with('swal_success', 'Profile berhasil diperbarui!');
    }
}
