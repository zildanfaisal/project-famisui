<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Posttest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class UsersExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting
{
    protected $maxPosttest;

    public function __construct()
    {
        $this->maxPosttest = Posttest::selectRaw('user_id, COUNT(*) as total')
            ->groupBy('user_id')
            ->orderByDesc('total')
            ->first()
            ->total ?? 0;
    }

    public function collection()
    {
        return User::where('role', 'user')
            ->with(['pretest', 'posttest'])
            ->get();
    }

    public function headings(): array
    {
        $headings = [
            'No',
            'Nama',
            'Usia',
            'Pekerjaan',
            'No. WA',
            'Pendidikan Terakhir',
            'Jumlah Melahirkan',
            'Jenis Persalinan',
            'Jenis Kelamin Bayi',
            'Nilai Pre-Test',
        ];

        for ($i = 1; $i <= $this->maxPosttest; $i++) {
            $headings[] = 'Post Test ke-' . $i;
            $headings[] = 'Intensitas Menyusui ke-' . $i;
            $headings[] = 'Susu Formula ke-' . $i;
            $headings[] = 'Perawatan ke-' . $i;
            $headings[] = 'Kendala Menyusui ke-' . $i;
            $headings[] = 'Konsultasi Kendala ke-' . $i;
        }

        return $headings;
    }

    public function map($user): array
    {
        static $no = 1;

        $row = [
            $no++,
            $user->name,
            $user->usia,
            $user->pekerjaan,
            ' ' . $user->phone, // biar gak jadi angka ilmiah
            $user->pendidikan_terakhir,
            $user->jumlah_melahirkan,
            $user->jenis_persalinan,
            $user->jenis_kelamin_bayi,
            $user->pretest->skor ?? '-',
        ];

        $posttests = $user->posttest->toArray();

        for ($i = 0; $i < $this->maxPosttest; $i++) {
            $pt = $posttests[$i] ?? null;

            $row[] = $pt['skor'] ?? '-';
            $row[] = $pt['intensitas_menyusui'] ?? '-';
            $row[] = isset($pt['susu_formula']) ? ($pt['susu_formula'] ? 'Ya' : 'Tidak') : '-';
            $row[] = isset($pt['perawatan']) ? implode(', ', (array)$pt['perawatan']) : '-';
            $row[] = $pt['kendala_menyusui'] ?? '-';
            $row[] = isset($pt['konsultasi_kendala']) ? ($pt['konsultasi_kendala'] ? 'Ya' : 'Tidak') : '-';
        }

        return $row;
    }

    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_TEXT,
        ];
    }
}
