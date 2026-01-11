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
        $data = ([
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
        ]);
        // Jika ada foto baru, proses upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/murid/foto/'), $filename);

            $data['foto'] = $filename;
        }
        // Jika ada akta baru, proses upload
        if ($request->hasFile('akta')) {
            $file = $request->file('akta');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/murid/akta/'), $filename);

             $data['akta'] = $filename;
        }
        // Jika ada kk baru, proses upload
        if ($request->hasFile('kk')) {
            $file = $request->file('kk');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/murid/kk/'), $filename);

             $data['kk'] = $filename;
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
        $data = ([
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
        ]);
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika perlu
            if ($murid->foto && file_exists(public_path('storage/murid/foto/' . $murid->foto))) {
                unlink(public_path('storage/murid/foto/' . $murid->foto));
            }

            // Simpan foto baru
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/murid/foto/'), $filename);
            $data['foto'] = $filename;
        } else {
            // Gunakan foto lama
            $data['foto'] = $murid->foto;
        }
        if ($request->hasFile('akta')) {
            // Hapus akta lama jika perlu
            if ($murid->akta && file_exists(public_path('storage/murid/akta/' . $murid->akta))) {
                unlink(public_path('storage/murid/akta/' . $murid->akta));
            }

            // Simpan akta baru
            $file = $request->file('akta');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/murid/akta/'), $filename);
            $data['akta'] = $filename;
        } else {
            // Gunakan akta lama
            $data['akta'] = $murid->akta;
        }
        if ($request->hasFile('kk')) {
            // Hapus kk lama jika perlu
            if ($murid->kk && file_exists(public_path('storage/murid/kk/' . $murid->kk))) {
                unlink(public_path('storage/murid/kk/' . $murid->kk));
            }

            // Simpan kk baru
            $file = $request->file('kk');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/murid/kk/'), $filename);
            $data['kk'] = $filename;
        } else {
            // Gunakan kk lama
            $data['kk'] = $murid->kk;
        }
        $murid->update($data);
        return redirect('/data-murid')->with('swal_success', 'Data berhasil diperbarui');
    }
    public function destroy($id)
    {
        $murid = MuridModel::findOrFail($id);
        // ===== HAPUS DATA =====
        $murid->delete();

        return redirect('/data-murid')->with('swal_success', 'Data murid berhasil dihapus');
    }
}
