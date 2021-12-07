<?php

namespace App\Imports;

use App\Models\SaranaDiuji;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class ImportExcel implements ToModel,SkipsEmptyRows,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row['tgl_pengujian'])) {
            $row['tgl_pengujian']=NULL;
        }elseif(isset($row['tgl_pengujian'])){
            $row['tgl_pengujian']=\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tgl_pengujian']);
        }
        return new SaranaDiuji([
            'identitas'=> $row['identitas'], 
            'user'=> $row['user'], 
            'jenis_sarana'=> $row['jenis_sarana'], 
            'operator'=> $row['operator'], 
            'lokasi'=> $row['lokasi'], 
            'wilayah'=> $row['wilayah'], 
            'jenis_pengujian'=> $row['jenis_pengujian'], 
            'tgl_pengujian'=> $row['tgl_pengujian'], 
            'status_uji'=> $row['status_uji'],
            'keterangan'=> $row['keterangan'],
        ]);
    }
}
