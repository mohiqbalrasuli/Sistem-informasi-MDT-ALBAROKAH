<?php

namespace App\Http\Controllers;

use App\Models\GaleriModel;
use App\Models\MisiModel;
use App\Models\MuridModel;
use App\Models\PengajarModel;
use App\Models\ProfileModel;
use App\Models\ProgramUnggulanModel;
use App\Models\TujuanModel;
use App\Models\VisiModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $profile = ProfileModel::first();
        $umurBerdiri = null;
        if ($profile && $profile->tahun_berdiri) {
            $umurBerdiri = Carbon::now()->year - (int) $profile->tahun_berdiri;
        }
        $visi = VisiModel::first();
        $misi = MisiModel::all();
        $tujuan = TujuanModel::all();
        $jumlah_murid = MuridModel::count();
        $jumlah_pengajar = PengajarModel::count();
        $jumlahprogram = ProgramUnggulanModel::count();
        $program = ProgramUnggulanModel::all();
        $galeri = GaleriModel::all();
        return view('landing.index', compact('profile', 'umurBerdiri', 'visi', 'misi', 'tujuan', 'jumlah_murid', 'jumlah_pengajar', 'jumlahprogram', 'program', 'galeri'));
    }
}
