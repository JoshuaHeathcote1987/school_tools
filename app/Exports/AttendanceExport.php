<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use App\Models\Student;
use App\Models\Attendance;

class AttendanceExport implements FromView, ShouldAutoSize
{

    public $data;

    public function __construct($data)
    {
        $this->data = $data;

    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('export.attendance', [
            'data' => $this->data    
        ]);
    }
}
