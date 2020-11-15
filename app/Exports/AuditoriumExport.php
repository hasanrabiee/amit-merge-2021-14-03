<?php

namespace App\Exports;

use App\Auditorium;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AuditoriumExport implements FromCollection , WithHeadings , WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Auditorium::all();
    }

    public function headings(): array
    {
        return [
            'Speaker Name',
            'Speaker UserName',
            'Speaker Speech Title',
            'Conference Date',
            'Start Time',
            'End Time',

        ];
    }

    public function map($row): array
    {
        return [
            $row->Speaker->Name,
            $row->Speaker->UserName,
            $row->Speaker->SpeechTitle,
            $row->Day,
            Carbon::parse($row->Start)->format('H:i'),
            Carbon::parse($row->End)->format('H:i'),
        ];
    }
}
