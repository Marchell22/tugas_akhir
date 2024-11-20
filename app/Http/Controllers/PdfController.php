<?php

namespace App\Http\Controllers;

use App\Models\AkunTransaksi;
use App\Models\JurnalPenyesuaian;
use App\Models\JurnalUmum;
use App\Models\RencanaAnggaranBiaya;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function downloadRAB($id)
    {
        $rencanaAnggaranBiaya = RencanaAnggaranBiaya::findOrFail($id);
        $uraianPekerjaan = $rencanaAnggaranBiaya->uraian_pekerjaan ?? [];
        $data = [
            'rencanaAnggaranBiaya' => $rencanaAnggaranBiaya,
            'uraianPekerjaan' => $uraianPekerjaan
        ];

        // Load view dengan data dan generate PDF
        $pdf = Pdf::loadView('pdf.laporanRAB', $data)->setPaper('A4', 'portrait'); // A4 dengan orientasi portrait;

        // Download PDF dengan nama invoice.pdf
        return $pdf->download('LaporanRAB.pdf');
    }
    public function downloadbukubesar()
    {
        // Mengambil data dari sesi
        $results = session('results', collect());
        $akunTransaksiList = session('akunTransaksiList', collect());
        $dataThreshold = session('dataThreshold', collect());
        $currentdate = session('currentdate', collect());
        $data = [
            'results' => $results,
            'akunTransaksiList' => $akunTransaksiList,
            'dataThreshold' => $dataThreshold,
            'currentdate' => $currentdate,
        ];

        // Load view dengan data dan generate PDF
        $pdf = Pdf::loadView('pdf.laporanBukuBesar', $data)->setPaper('A4', 'portrait'); // A4 dengan orientasi portrait;

        // Download PDF dengan nama invoice.pdf
        return $pdf->download('BukuBesar.pdf');
    }
    public function downloadNeraca()
    {
        // Mengambil data dari sesi
        $results = session('results', collect());
        $akunTransaksi = session('akunTransaksi', collect());
        $kategori = session('kategori', collect());
        $dataThreshold = session('dataThreshold', collect());
        $currentdate = session('currentdate', collect());
        $data = [
            'results' => $results,
            'akunTransaksi' => $akunTransaksi,
            'kategori' => $kategori,
            'dataThreshold' => $dataThreshold,
            'currentdate' => $currentdate,
        ];
        // Load view dengan data dan generate PDF
        $pdf = Pdf::loadView('pdf.laporanNeraca', $data)->setPaper('A4', 'portrait'); // A4 dengan orientasi portrait;

        // Download PDF dengan nama invoice.pdf
        return $pdf->download('Neraca.pdf');
    }
    public function downloadEkuitas()
    {
        // Mengambil data dari sesi
        $aggregatedResults = session('aggregatedResults', collect());
        $akunTransaksi = session('akunTransaksi', collect());
        $dataThreshold = session('dataThreshold', collect());
        $currentdate = session('currentdate', collect());
        $data = [
            'aggregatedResults' => $aggregatedResults,
            'akunTransaksi' => $akunTransaksi,
            'dataThreshold' => $dataThreshold,
            'currentdate' => $currentdate,
        ];
        // Load view dengan data dan generate PDF
        $pdf = Pdf::loadView('pdf.laporanPerubahanEkuitas', $data)->setPaper('A4', 'portrait'); // A4 dengan orientasi portrait;

        // Download PDF dengan nama invoice.pdf
        return $pdf->download('Ekuitas.pdf');
    }
    public function downloadLabaRugi()
    {
        // Mengambil data dari sesi
        $aggregatedResults = session('aggregatedResults', collect());
        $akunTransaksi = session('akunTransaksi', collect());
        $dataThreshold = session('dataThreshold', collect());
        $currentdate = session('currentdate', collect());
        $data = [
            'aggregatedResults' => $aggregatedResults,
            'akunTransaksi' => $akunTransaksi,
            'dataThreshold' => $dataThreshold,
            'currentdate' => $currentdate,
        ];
        // Load view dengan data dan generate PDF
        $pdf = Pdf::loadView('pdf.laporanLabaRugi', $data)->setPaper('A4', 'portrait'); // A4 dengan orientasi portrait;

        // Download PDF dengan nama invoice.pdf
        return $pdf->download('LabaRugi.pdf');
    }
    public function downloadPosisiKeuangan()
    {
        // Mengambil data dari sesi
        $aggregatedResults = session('aggregatedResults', collect());
        $akunTransaksi = session('akunTransaksi', collect());
        $dataThreshold = session('dataThreshold', collect());
        $currentdate = session('currentdate', collect());
        $data = [
            'aggregatedResults' => $aggregatedResults,
            'akunTransaksi' => $akunTransaksi,
            'dataThreshold' => $dataThreshold,
            'currentdate' => $currentdate,
        ];
        // Load view dengan data dan generate PDF
        $pdf = Pdf::loadView('pdf.laporanPosisiKeuangan', $data)->setPaper('A4', 'portrait'); // A4 dengan orientasi portrait;

        // Download PDF dengan nama invoice.pdf
        return $pdf->download('Posisikeuangan.pdf');
    }
    public function downloadJurnalPenutup()
    {
        // Mengambil data dari sesi
        $aggregatedResults = session('aggregatedResults', collect());
        $akunTransaksi = session('akunTransaksi', collect());
        $dataThreshold = session('dataThreshold', collect());
        $currentdate = session('currentdate', collect());
        $data = [
            'aggregatedResults' => $aggregatedResults,
            'akunTransaksi' => $akunTransaksi,
            'dataThreshold' => $dataThreshold,
            'currentdate' => $currentdate,
        ];
        // Load view dengan data dan generate PDF
        $pdf = Pdf::loadView('pdf.laporanJurnalPenutup', $data)->setPaper('A4', 'portrait'); // A4 dengan orientasi portrait;

        // Download PDF dengan nama invoice.pdf
        return $pdf->download('JurnalPenutup.pdf');
    }
}
