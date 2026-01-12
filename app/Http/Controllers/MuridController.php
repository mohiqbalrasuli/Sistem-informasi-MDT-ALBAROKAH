<?php

namespace App\Http\Controllers;

use App\Models\MuridModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MuridController extends Controller
{
    public function index(Request $request)
    {
        if ($request->kelas) {
            $murid = MuridModel::where('kelas', $request->kelas)->get();
        } else {
            $murid = MuridModel::all();
        }
        return view('murid.murid', compact('murid'));
    }
    public function create()
    {
        return view('murid.create_murid');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|in:shifir_a,shifir_b,kelas_1,kelas_2,kelas_3,kelas_4',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'tahun_masuk' => 'required|digits:4',
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
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tahun_masuk' => $request->tahun_masuk,
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

        MuridModel::create($data);

        return redirect('/data-murid')->with('swal_success', 'Data berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $murid = MuridModel::findOrFail($id);
        return view('murid.update_murid', compact('murid'));
    }

    public function update(Request $request, $id)
    {
        $murid = MuridModel::findOrFail($id);

        // ================= VALIDASI =================
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|in:shifir_a,shifir_b,kelas_1,kelas_2,kelas_3,kelas_4',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'tahun_masuk' => 'required|digits:4',
            'alamat' => 'required|string|max:255',

            'foto' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'akta' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'kk' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',

            'nama_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
        ]);

        // ================= UPDATE DATA TEXT =================
        $data = [
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tahun_masuk' => $request->tahun_masuk,
            'alamat' => $request->alamat,
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'no_telp' => $request->no_telp,
        ];
        if ($request->hasFile('foto')) {
            // hapus file lama
            if ($murid->foto && Storage::disk('public')->exists($murid->foto)) {
                Storage::disk('public')->delete($murid->foto);
            }

            // simpan file baru
            $path = $request->file('foto')->store('murid/foto', 'public');
            $data['foto'] = $path;
        } else {
            $data['foto'] = $murid->foto;
        }

        if ($request->hasFile('akta')) {
            // hapus file lama
            if ($murid->akta && Storage::disk('public')->exists($murid->akta)) {
                Storage::disk('public')->delete($murid->akta);
            }

            // simpan file baru
            $path = $request->file('akta')->store('murid/akta', 'public');
            $data['akta'] = $path;
        } else {
            $data['akta'] = $murid->akta;
        }

        if ($request->hasFile('kk')) {
            // hapus file lama
            if ($murid->kk && Storage::disk('public')->exists($murid->kk)) {
                Storage::disk('public')->delete($murid->kk);
            }

            // simpan file baru
            $path = $request->file('kk')->store('murid/kk', 'public');
            $data['kk'] = $path;
        } else {
            $data['kk'] = $murid->kk;
        }
        $murid->update($data);
        return redirect('/data-murid')->with('swal_success', 'Data berhasil diperbarui');
    }
    public function destroy($id)
    {
        $murid = MuridModel::findOrFail($id);
        if ($murid->foto && Storage::disk('public')->exists($murid->foto)) {
            Storage::disk('public')->delete($murid->foto);
        }
        if ($murid->akta && Storage::disk('public')->exists($murid->akta)) {
            Storage::disk('public')->delete($murid->akta);
        }
        if ($murid->kk && Storage::disk('public')->exists($murid->kk)) {
            Storage::disk('public')->delete($murid->kk);
        }
        $murid->delete();

        return redirect('/data-murid')->with('swal_success', 'Data murid berhasil dihapus');
    }
}
