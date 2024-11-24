<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use function PHPUnit\Framework\isEmpty;

class AddAcademicYearController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // dd(date('Y-m-d',strtotime(now())));

        try {
            // Check if the current year (which is the time of registration) exists, if yes, don't allow
            $year_exists = AcademicYear::select(
                DB::raw('YEAR(academic_year.start_date) as acad_start')
            )->having('acad_start',DB::raw('YEAR(NOW())'))
            ->first();

            if(!$year_exists) {
                // FIXME: //[x] Only allow the creation of new acad year when it doesnt exist yet (start and end dates)
                AcademicYear::create([
                    'start_date' => date('Y-m-d',strtotime(now())),
                    'end_date' => date('Y-m-d',strtotime('+1 year',strtotime(now())))
                ]);

                session(['success' => 'Academic year registered successfully!']);
            }

            throw new Exception("Academic Year already registered!");
        } catch(Exception $e) {
            // throw $e;
            session(['failure' => 'Something went wrong :( <br><br> - '.$e->getMessage()]);
        }

        return to_route('admin.settings');
    }
}
