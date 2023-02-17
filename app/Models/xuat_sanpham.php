<?php

namespace App\Models;

use App\Models\sanpham;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;


class xuat_sanpham implements FromCollection,WithHeadings,WithCustomStartCell,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return sanpham::all();
    }
    public function headings(): array
    {
        return [
            'tensp', 
            'anh',
            'soluong', 
            'gianhap',  
            'giaxuat',
            'loai_id',
            'hang_id', 
            'noisanxuat_id',
            'baohanh_id',
            'chitiet',
            'video',
        ];
    }
    public function map($row): array
    {
        return [
            $row->tensp,
            $row->anh,
            $row->soluong,
            $row->gianhap,
            $row->giaxuat,
            $row->loai_id,
            $row->hang_id,
            $row->noisanxuat_id,
            $row->baohanh_id,
            $row->chitiet,
            $row->video,

        ];
    }
    public function startCell(): string
    {
        return 'A6';
    }
    


}
