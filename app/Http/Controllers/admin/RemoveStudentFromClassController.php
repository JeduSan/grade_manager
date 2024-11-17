<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RemoveStudentFromClassController extends Controller
{
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $student_class_id, string $class_id)
    {
        try {
            StudentClass::destroy($student_class_id);
            session(['success' => 'Student deleted successfully!']);
        } catch (Exception $e) {
            session(['failure' => 'Something went wrong :(']);
        }

        return redirect("/admin/manager/view/class/$class_id");
    }
}
