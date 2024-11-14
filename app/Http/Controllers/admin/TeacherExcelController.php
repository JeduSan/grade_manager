<?php

namespace App\Http\Controllers\admin;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Rap2hpoutre\FastExcel\FastExcel;

class TeacherExcelController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'excel' => [
                'required',
                'file',
                'mimes:csv,xlsx,xlsm,xls,xlsb,xltm',
                'max:50000'
            ]
        ]);

        try {
            $collection = (new FastExcel)->import($request->excel)->toArray();

            DB::table('teacher')->insert($collection);

            session(['success' => 'Teacher added successfully!']);
        } catch(Exception $e) {
            session(['failure' => 'Something went wrong :( Please make sure that the subjects does not exists yet from the subject list; and check the formatting!']);
        }

        return to_route('admin.manager.teacher');
    }
}
