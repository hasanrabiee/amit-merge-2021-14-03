<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function headings(): array
    {
        return [
            'FirstName',
            'LastName',
            'UserName',
            'PhoneNumber',
            'Gender',
            'email',
            'City',
            'Country',
            'BirthDate',
            'VisitExperience'
        ];
    }


    public function collection()
    {
//        return User::all();
        return User::select('FirstName', 'LastName', 'UserName', 'PhoneNumber','Gender','email','City','Country', 'BirthDate','VisitExperience')->whereIn('Rule', ['Visitor', 'Exhibitor'] )->get();

    }
}
