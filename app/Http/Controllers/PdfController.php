<?php

namespace App\Http\Controllers;

use App\Models\RencanaAnggaranBiaya;
use Barryvdh\DomPDF\Facade\Pdf;
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
        return $pdf->download('invoice.pdf');
    }
}
