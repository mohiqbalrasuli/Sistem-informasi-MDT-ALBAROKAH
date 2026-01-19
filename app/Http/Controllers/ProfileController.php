<?php

namespace App\Http\Controllers;

use App\Models\MisiModel;
use App\Models\ProfileModel;
use App\Models\TujuanModel;
use App\Models\VisiModel;
use App\Models\GaleriModel;
use App\Models\ProgramUnggulanModel;
use App\Models\WaktuPMBModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = ProfileModel::first();
        $visi = VisiModel::all();
        $misi = MisiModel::all();
        $tujuan = TujuanModel::all();
        $galeri = GaleriModel::all();
        $program = ProgramUnggulanModel::all();
        $waktu = WaktuPMBModel::first();
        return view('profile.profile', compact('profile','visi','misi','tujuan','galeri','program','waktu'));
    }
    // setting PBM
    public function pmbSetting(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $profile = WaktuPMBModel::first();
        $profile->tanggal_mulai = $request->tanggal_mulai;
        $profile->tanggal_selesai = $request->tanggal_selesai;
        $profile->save();

        return redirect()->back()->with('swal_success', 'Pengaturan PMB berhasil diperbarui!');
    }
    // galery start
    public function galeristore(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'nullable|string|max:255',
        ]);
        $data = [
            'keterangan' => $request->keterangan,
        ];
       if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('galeri', 'public');
            $data['foto'] = $path;
        }

        // Simpan informasi gambar ke database
        GaleriModel::create($data);
        return redirect()->back()->with('swal_success', 'Gambar berhasil diunggah!');
    }
    public function galeriUpdate(Request $request, $id)
    {
        $galeri = GaleriModel::findOrFail($id);
        $request->validate([
            'keterangan' => 'nullable|string|max:255',
        ]);
        if ($request->hasFile('foto')) {
            // hapus file lama
            if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
                Storage::disk('public')->delete($galeri->foto);
            }

            // simpan file baru
            $path = $request->file('foto')->store('galeri', 'public');
            $data['foto'] = $path;
        } else {
            $data['foto'] = $galeri->foto;
        }
        $galeri->keterangan = $request->keterangan;
        $galeri->save();
        return redirect()->back()->with('swal_success', 'Keterangan berhasil diupdate!');
    }
    public function galeriDelete($id)
    {
        $galeri = GaleriModel::findOrFail($id);
        // Hapus file gambar dari server
        if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
            Storage::disk('public')->delete($galeri->foto);
        }
        $galeri->delete();
        return redirect()->back()->with('swal_success', 'Gambar berhasil dihapus!');
    }
    // galery end

    // program unggulan start
    public function programStore(Request $request)
    {
        $request->validate([
            'icon'=>'required|string|max:100',
            'program_unggulan'=>'required|string|max:255',
            'keterangan'=>'nullable|string|max:500',
            ]);
        ProgramUnggulanModel::create([
            'program_unggulan'=> $request->program_unggulan,
            'keterangan'=>$request->keterangan,
            'icon'=>$request->icon
        ]);
        return redirect()->back()->with('swal_success','Program Unggulan berhasil di tambahkan!');
    }
    public function programUpdate(Request $request,$id)
    {
        $program = ProgramUnggulanModel::findOrFail($id);
        $request->validate([
            'icon'=>'required|string|max:100',
            'program_unggulan'=>'required|string|max:255',
            'keterangan'=>'nullable|string|max:500',
            ]);
        $program->program_unggulan = $request -> program_unggulan;
        $program->keterangan = $request -> keterangan;
        $program->icon = $request -> icon;
        $program -> save();
        return redirect('/setting')->with('swal_success','Program Unggulan berhasil di update!');
    }
    public function programDelete($id)
    {
        $program = ProgramUnggulanModel::findOrFail($id);
        $program -> delete();
        return redirect()->back()->with('swal_success','Program Unggulan berhasil di hapus!');
    }
    // program unggulan end

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
        return redirect('/setting')->with('swal_success','Visi berhasil di update!');
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
        return redirect('/setting')->with('swal_success','Misi berhasil di update!');
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
        return redirect('/setting')->with('swal_success','Tujuan berhasil di update!');
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
            // hapus file lama
            if ($profile->gambar && Storage::disk('public')->exists($profile->gambar)) {
                Storage::disk('public')->delete($profile->gambar);
            }

            // simpan file baru
            $path = $request->file('gambar')->store('profile', 'public');
            $profile['gambar'] = $path;
        } else {
            $profile['gambar'] = $profile->gambar;
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

        return redirect('/setting')->with('swal_success', 'Profile berhasil diperbarui!');
    }
}
