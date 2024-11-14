<?php

namespace App\Http\Controllers\admin;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Rap2hpoutre\FastExcel\FastExcel;

class StudentExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

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

            DB::table('student')->insert($collection);

            session(['success' => 'Students added successfully!']);
        } catch(Exception $e) {
            session(['failure' => 'Something went wrong :( Please make sure that the student records does not contain duplicates!']);
        }

        return to_route('admin.manager.student');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
