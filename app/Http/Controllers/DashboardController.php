<?php

namespace App\Http\Controllers;

use App\Models\MuridModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index()
    {
        $muridlk = MuridModel::where('jenis_kelamin','Laki-laki')->count();
        $muridpr = MuridModel::where('jenis_kelamin','Perempuan')->count();
        return view('dashboard',compact('muridlk','muridpr'));
    }
    public function dataMurid()
    {
        // DATA UNTUK BAR CHART (DIPANGGIL DI DASHBOARD)
        return response()->json([
            'kelas' => ['Kelas Shifir A','Kelas Shifir B','Kelas 1', 'Kelas 2', 'Kelas 3','Kelas 4'],
            'laki' => [15, 18, 20, 23, 12, 34],
            'perempuan' => [14, 16, 18, 13, 12, 11],
            'total' => [29, 34, 38, 41, 25, 45],
        ]);
    }
    public function muridTahun()
    {
        return response()->json([
            'Tahun' => ['2021','2022','2023','2024','2025'],
            'murid' => ['20','43','34', '35','54']
        ]);
    }
    public function dataPengajar()
    {
        return response()->json([
            'JenisKelamin' => ['Laki - Laki','Perempuan'],
            'jumlah' => ['4','6']
        ]);
    }
    public function dataFan()
    {
        return response()->json([
            'kelas' => ['Kelas Shifir A','Kelas Shifir B','Kelas 1', 'Kelas 2', 'Kelas 3','Kelas 4'],
            'jumlah' => [15, 18, 20, 23, 12, 34],
        ]);
    }
}
