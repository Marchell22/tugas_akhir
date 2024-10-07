public function Ekuitas(Request $request)
{
    $akunTransaksi = AkunTransaksi::where('status', 'approved')->get();
    $kriteria = $request->input('kriteria');
    $periode = $request->input('periode');
    $dateThreshold = $this->getDateThreshold($kriteria, $periode);
    $tanggalAwal = $request->input('tanggal_awal');
    $tanggalAkhir = $request->input('tanggal_akhir');

    // Ambil data dari Jurnal Umum dan Jurnal Penyesuaian untuk kelompok_akun_id yang relevan
    $jurnalUmumResults = $this->getJurnalResults($akunTransaksi, 3, $dateThreshold, $kriteria, $tanggalAwal, $tanggalAkhir, 'JurnalUmum');
    $jurnalPenyesuaianResults = $this->getJurnalResults($akunTransaksi, 3, $dateThreshold, $kriteria, $tanggalAwal, $tanggalAkhir, 'JurnalPenyesuaian');

    // Tambahkan akun kelompok_akun_id 4 (Pendapatan) dan 6 (Beban)
    $jurnalUmumResults = $jurnalUmumResults->merge($this->getJurnalResults($akunTransaksi, 4, $dateThreshold, $kriteria, $tanggalAwal, $tanggalAkhir, 'JurnalUmum'));
    $jurnalPenyesuaianResults = $jurnalPenyesuaianResults->merge($this->getJurnalResults($akunTransaksi, 4, $dateThreshold, $kriteria, $tanggalAwal, $tanggalAkhir, 'JurnalPenyesuaian'));
    $jurnalPenyesuaianResults = $jurnalPenyesuaianResults->merge($this->getJurnalResults($akunTransaksi, 6, $dateThreshold, $kriteria, $tanggalAwal, $tanggalAkhir, 'JurnalPenyesuaian'));
    $jurnalUmumResults = $jurnalUmumResults->merge($this->getJurnalResults($akunTransaksi, 6, $dateThreshold, $kriteria, $tanggalAwal, $tanggalAkhir, 'JurnalUmum'));

    // Gabungkan hasil jurnal umum dan penyesuaian
    $combinedResults = $jurnalUmumResults->merge($jurnalPenyesuaianResults);

    // Agregasi nilai berdasarkan akun_id
    $aggregatedResults = $this->aggregateResults($combinedResults);

    return view('admin.Ekuitas', compact('akunTransaksi', 'aggregatedResults'));
}

private function getDateThreshold($kriteria, $periode)
{
    if ($kriteria === 'periode') {
        switch ($periode) {
            case 1:
                return Carbon::now()->subYear();
            case 2:
                return Carbon::now()->subMonth();
            case 3:
                return Carbon::now()->subWeek();
        }
    }
    return null;
}

private function getJurnalResults($akunTransaksi, $kelompokAkunId, $dateThreshold, $kriteria, $tanggalAwal, $tanggalAkhir, $jurnalType)
{
    $jurnalModel = $jurnalType === 'JurnalUmum' ? new JurnalUmum : new JurnalPenyesuaian;
    $results = collect();

    foreach ($akunTransaksi->where('kelompok_akun_id', $kelompokAkunId) as $akun) {
        $query = $jurnalModel::where('akun_id', $akun->id)->where('status', 'approved');

        if ($dateThreshold) {
            $query->where('created_at', '>=', $dateThreshold);
        } elseif ($kriteria === 'tanggal' && $tanggalAwal && $tanggalAkhir) {
            $query->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir]);
        }

        $results = $results->merge($query->get());
    }

    return $results;
}

private function aggregateResults($combinedResults)
{
    return $combinedResults->groupBy('akun_id')->map(function ($group) {
        return $group->reduce(function ($carry, $item) {
            if (!isset($carry->nilai)) {
                $carry->nilai = 0;
            }
            if (!isset($carry->debit_atau_kredit)) {
                $carry->debit_atau_kredit = $item->debit_atau_kredit;
            }

            if ($item->debit_atau_kredit !== $carry->debit_atau_kredit && $carry->debit_atau_kredit !== null) {
                $carry->nilai -= $item->nilai;
            } else {
                $carry->nilai += $item->nilai;
            }

            $carry->debit_atau_kredit = $item->debit_atau_kredit;

            return $carry;
        }, (object) ['akun_id' => $group->first()->akun_id, 'nilai' => 0]);
    });
}
