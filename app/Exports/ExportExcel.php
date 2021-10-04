<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithProperties;

class ExportExcel implements WithProperties
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function properties(): array
    {
        return [
            'identitas' => null,
            'user' => null,
            'jenis_sarana' => null,
            'operator' => null,
            'lokasi' => null,
            'wilayah' => 'Wilayah I/Wilayah II',
            'jenis_pengujian' => 'Uji Berkala/Uji Pertama',
            'tgl_pengujian' => null,
            'status_uji' => 'Lulus/Tidak Lulus/Pending/Belum Diuji',
            'keterangan' => null
        ];
    }
}
