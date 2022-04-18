<?php

namespace App\Exports;

use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class IdeasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Idea::where('category_id', Auth::user()->category_id)->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID", "Title", "content", 'created_by', 'updated_by','department_id', 'created_at', 'udated_at', 'tags', 'is_anonymously'];
    }
}
