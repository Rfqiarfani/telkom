<?php

namespace App\Exports;

use App\Models\KegiatanModel;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return User::where('role', '!=', 'Admin') // Cegah Admin masuk ke laporan
        ->select('users.id', 'users.name')
        ->withCount([
                'kegiatan as total_order',
                'kegiatan as datin' => function ($query) { $query->where('jenis_wo', 'DATIN'); },
                'kegiatan as digipos' => function ($query) { $query->where('jenis_wo', 'DIGIPOS'); },
                'kegiatan as ekspan' => function ($query) { $query->where('jenis_wo', 'EKSPAN'); },
                'kegiatan as indibiz' => function ($query) { $query->where('jenis_wo', 'INDIBIZ'); },
                'kegiatan as pda' => function ($query) { $query->where('jenis_wo', 'PDA'); },
                'kegiatan as mo' => function ($query) { $query->where('jenis_wo', 'MO'); },
                'kegiatan as orbit' => function ($query) { $query->where('jenis_wo', 'ORBIT'); },
                'kegiatan as stb' => function ($query) { $query->where('jenis_wo', 'STB'); },
                'kegiatan as dismant' => function ($query) { $query->where('jenis_wo', 'DISMANT'); },
            ])
            ->withSum('kegiatan as total_point', 'point')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Nama Teknisi',
            'Total Order',
            'DATIN', 'DIGIPOS', 'EKSPAN', 'INDIBIZ', 'PDA', 'MO', 'ORBIT', 'STB', 'DISMANT',
            'Total Poin', 'Target Poin (203)', 'Target/Bulan (176)', 'Produktivitas'
        ];
    }

    public function map($row): array
    {
        // Hitung Produktivitas
        $produktivitas = $row->total_point >= 203 ? 'Tinggi' : ($row->total_point >= 176 ? 'Sedang' : 'Rendah');

        return [
            $row->name,
            $row->total_order,
            $row->datin,
            $row->digipos,
            $row->ekspan,
            $row->indibiz,
            $row->pda,
            $row->mo,
            $row->orbit,
            $row->stb,
            $row->dismant,
            $row->total_point,
            203, // Target Poin
            176, // Target/Bulan
            $produktivitas
        ];
    }
}
