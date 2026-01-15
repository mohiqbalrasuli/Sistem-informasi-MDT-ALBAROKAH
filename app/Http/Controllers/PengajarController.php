<?php

namespace App\Http\Controllers;

use App\Models\PengajarModel;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class PengajarController extends Controller
{
    public function index()
    {
        $pengajar = PengajarModel::all();
        return view('pengajar.pengajar',compact('pengajar'));
    }
    public function create()
    {
        return view('pengajar.create_pengajar');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required|string|max:255',
            'jenis_kelamin'=>'required|in:Laki-laki,Perempuan',
            'tempat_lahir'=>'required|string|max:255',
            'tanggal_lahir'=>'required|date',
            'alamat'=>'required|string|max:255',
            'no_telp'=>'required|string|max:255'
        ]);
        PengajarModel::create([
            'nama'=>$request->nama,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'tempat_lahir'=>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'alamat'=>$request->alamat,
            'no_telp'=>$request->no_telp
        ]);
        return redirect('/data-pengajar')->with('swal_success','Data Pengajar Berhasil Di tambahkan!');
    }
    public function edit($id)
    {
        $pengajar = PengajarModel::findOrFail($id);
        return view('pengajar.update_pengajar',compact('pengajar'));
    }
    public function update(Request $request,$id)
    {
        $pengajar = PengajarModel::findOrFail($id);
        $request->validate([
            'nama'=>'required|string|max:255',
            'jenis_kelamin'=>'required|in:Laki-laki,Perempuan',
            'tempat_lahir'=>'required|string|max:255',
            'tanggal_lahir'=>'required|date',
            'alamat'=>'required|string|max:255',
            'no_telp'=>'required|string|max:255'
        ]);
        $pengajar->nama = $request->nama;
        $pengajar->jenis_kelamin = $request->jenis_kelamin;
        $pengajar->tempat_lahir = $request->tempat_lahir;
        $pengajar->tanggal_lahir = $request->tanggal_lahir;
        $pengajar->alamat = $request->alamat;
        $pengajar->no_telp = $request->no_telp;
        $pengajar->save();

        return redirect('/data-pengajar')->with('swal_success','Data Pengajar Berhasil Di update!');
    }
    public function destroy($id)
    {
        $pengajar = PengajarModel::findOrFail($id);
        $pengajar->delete();
        return redirect()->back()->with('swal_success','Data Pengajar Berhasil Di Hapus!');
    }
}
