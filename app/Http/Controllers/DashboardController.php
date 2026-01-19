<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use App\Models\FanModel;
use App\Models\MuridModel;
use App\Models\PengajarModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index()
    {
        $pengajar = PengajarModel::count();
        $fan = FanModel::count();
        $blog = BlogModel::where('status','publish')->count();
        $muridlk = MuridModel::where('jenis_kelamin', 'Laki-laki')->count();
        $muridpr = MuridModel::where('jenis_kelamin', 'Perempuan')->count();
        return view('dashboard', compact('muridlk', 'muridpr', 'pengajar', 'blog', 'fan'));
    }
    public function dataMurid()
    {
        // mapping enum ke label
        $mapKelas = [
            'shifir_a' => 'Kelas Shifir A',
            'shifir_b' => 'Kelas Shifir B',
            'kelas_1' => 'Kelas 1',
            'kelas_2' => 'Kelas 2',
            'kelas_3' => 'Kelas 3',
            'kelas_4' => 'Kelas 4',
        ];
        $data = DB::table('table_murid')
            ->select('kelas', DB::raw("SUM(CASE WHEN jenis_kelamin = 'Laki-laki' THEN 1 ELSE 0 END) AS laki"), DB::raw("SUM(CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END) AS perempuan"), DB::raw('COUNT(id) AS total'))
            ->groupBy('kelas')
            ->orderByRaw(
                "
            FIELD(kelas,
                'shifir_a',
                'shifir_b',
                'kelas_1',
                'kelas_2',
                'kelas_3',
                'kelas_4'
            )
        ",
            )
            ->get();

        return response()->json([
            'kelas' => $data->pluck('kelas')->map(fn($k) => $mapKelas[$k] ?? $k),
            'laki' => $data->pluck('laki'),
            'perempuan' => $data->pluck('perempuan'),
            'total' => $data->pluck('total'),
        ]);
    }
    public function muridTahun()
    {
        $data = DB::table('table_murid')->select(DB::raw('tahun_masuk as tahun'), DB::raw('COUNT(id) as murid'))->groupBy(DB::raw('tahun_masuk'))->orderBy('tahun_masuk')->get();

        return response()->json([
            'tahun' => $data->pluck('tahun'),
            'murid' => $data->pluck('murid'),
        ]);
    }
    public function dataPengajar()
    {
        $data = DB::table('table_pengajar')->select('jenis_kelamin', DB::raw('COUNT(id) as total'))->groupBy('jenis_kelamin')->get();

        return response()->json([
            'JenisKelamin' => $data->pluck('jenis_kelamin'),
            'jumlah' => $data->pluck('total'),
        ]);
        // return response()->json([
        //     'JenisKelamin' => ['Laki - Laki', 'Perempuan'],
        //     'jumlah' => ['4', '6'],
        // ]);
    }
    public function dataFan()
    {
        $mapKelas = [
            'shifir_a' => 'Kelas Shifir A',
            'shifir_b' => 'Kelas Shifir B',
            'kelas_1' => 'Kelas 1',
            'kelas_2' => 'Kelas 2',
            'kelas_3' => 'Kelas 3',
            'kelas_4' => 'Kelas 4',
        ];
        $data = DB::table('table_fan')->select(DB::raw('kelas as data_kelas'), DB::raw('count(id) as fan'))->groupBy(DB::raw('kelas'))->orderBy('kelas')->get();
        return response()->json([
            'kelas' => $data->pluck('data_kelas')->map(fn($k) => $mapKelas[$k] ?? $k),
            'jumlah' => $data->pluck('fan'),
        ]);
    }
}
