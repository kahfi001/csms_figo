<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Prequalification;
use App\Models\PrequalificationMinutes;
use App\Models\VendorDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PrintController extends Controller
{
    public static function beritaAcara($id)
    {
        $beritaAcara = PrequalificationMinutes::where('id', $id)->first();
        Carbon::setLocale('id');
        $created_at = Carbon::parse($beritaAcara->created_at);
        $hari = $created_at->translatedFormat('l');
        $tanggal = $created_at->translatedFormat('j');
        $bulan = $created_at->translatedFormat('F');
        $tahun = $created_at->translatedFormat('Y');
        $vendorDetail = VendorDetail::where('user_id', $beritaAcara->user_id)->first();
        $prakualifikasi = Prequalification::where('id', $beritaAcara->prequalification_id)->first();
        $pra_created_at = Carbon::parse($prakualifikasi->created_at);
        $tglPrakualifikasi = $pra_created_at->translatedFormat('j F Y');
        $tglttd = $pra_created_at->translatedFormat('d/m/Y');
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < 16; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $pdf = Pdf::loadView('berita-acara.print', [
            'beritaAcara' => $beritaAcara,
            'vendorDetail' => $vendorDetail,
            'tglttd' => $tglttd,
            'tanggal' => 'Pada hari ' . $hari . ' tanggal ' . $tanggal . ' bulan ' . $bulan . ' tahun ' . $tahun,
            'tglPrakualifikasi' => $tglPrakualifikasi
        ])->setPaper('a4', 'portrait');
        // return $pdf->stream('Berita Acara.pdf');

        Storage::put('/berita-acara/' . $randomString . '.pdf', $pdf->output());
        return PrequalificationMinutes::where('id', $id)->update([
            'document_path' => 'berita-acara/' . $randomString . '.pdf'
        ]);
    }

    public static function sertifikat($id)
    {
        $beritaAcara = PrequalificationMinutes::where('id', $id)->first();
        Carbon::setLocale('id');
        $romanMonths = [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII',
        ];
        $randomNumber = random_int(100000, 999999);
        $date = Carbon::now();
        $monthNumber = $date->month;
        $year = $date->year;
        $romanMonth = $romanMonths[$monthNumber];

        $nomorSertif = $randomNumber . '/HSE/CSMS/' . $romanMonth . '/' . $year;
        $vendorDetail = VendorDetail::where('user_id', $beritaAcara->user_id)->first();
        if ($beritaAcara->score < 30) {
            $tingkat = 'Rendah';
        } elseif ($beritaAcara->score >= 30 || $beritaAcara->score <= 50) {
            $tingkat = 'Moderat';
        } elseif ($beritaAcara->score >= 51 || $beritaAcara->score <= 75) {
            $tingkat = 'Tinggi';
        } elseif ($beritaAcara->score >= 76 || $beritaAcara->score <= 85) {
            $tingkat = 'Sangat Tinggi';
        } elseif ($beritaAcara->score >= 86 || $beritaAcara->score <= 100) {
            $tingkat = 'Ekstrem';
        }

        $tglCetak =  $date->translatedFormat('j F Y');

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < 16; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $qrcode = QrCode::format('png')->size(300)->generate(URL::asset('storage/sertifikat/' . $randomString . '.pdf'));
        $output_file = '/qrcodes/' . $randomString . '.png';
        Storage::put($output_file, $qrcode);

        // $qrcode_path = URL::asset('storage/' . $output_file);
        $qrcode_path = 'http://csms.my.id/public/storage/' + $output_file;


        $pdf = Pdf::loadView('sertifikat.print', [
            'nomorSertif' => $nomorSertif,
            'vendorDetail' => $vendorDetail,
            'tingkat' => $tingkat,
            'score' => $beritaAcara->score,
            'tglCetak' => $tglCetak,
            'qrcode_path' => $qrcode_path
        ])->setPaper('a4', 'landscape')->setOption('margin_top', 0);

        // return $pdf->stream('Sertifikat.pdf');
        Storage::put('/sertifikat/' . $randomString . '.pdf', $pdf->output());
        return Certificate::create([
            'certificate_number' => $nomorSertif,
            'user_id' => $vendorDetail->user_id,
            'prequalification_id' => $beritaAcara->prequalification_id,
            'certificate_path' => 'sertifikat/' . $randomString . '.pdf'
        ]);
    }
}
