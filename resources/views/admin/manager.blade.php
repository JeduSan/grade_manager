<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Manager</title>
    <link rel="stylesheet" href="{{asset('assets/css/jquery.modal.min.css')}}">
</head>
<body>

    {{-- SUCCESS MODAL --}}
    @if (session()->has('success'))
        {{--
             // [ ] Change z-index
             // [ ] Design
        --}}
        <div id="success_modal">
            <p>{{ session()->get('success') }}</p>
            @php
                session()->forget('success');
            @endphp
        </div>
    @endif

    {{-- FAILURE MODAL --}}
    @if (session()->has('failure'))
        {{--
             // [ ] Change z-index
             // [ ] Design
        --}}
        <div id="failure_modal">
            <p>{{ session()->get('failure') }}</p>
            @php
                session()->forget('failure');
            @endphp
        </div>
    @endif

    {{-- TEACHERS TABLE --}}
    {{-- <div>
        <h3>Manage Teacher</h3>
        <table>
            <thead>
                <th>Teacher ID</th>
                <th>Name</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>
                            {{$teacher->id}}
                        </td>
                        <td>
                            {{$teacher->fname . ' ' . $teacher->lname}}
                        </td>
                        <td>
                            <a href="#modal{{$teacher->key}}" rel="modal:open">Edit</a>
                            <a href="/admin/manager/delete/teacher/{{$teacher->key}}">Delete</a>
                            <a href="">View</a>
                        </td>
                    </tr>

                    <div id="modal{{$teacher->key}}" class="modal">
                        <h3>Edit Teacher</h3>
                        <form action="/admin/manager/edit/teacher/{{$teacher->key}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <div>
                                <label for="teacher_id">Teacher ID</label>
                                <input type="text" name="teacher_id" id="teacher_id" value="{{$teacher->id}}" placeholder="XMPL1234">
                            </div>
                            <div>
                                <label for="teacher_fname">Teacher First Name</label>
                                <input type="text" name="teacher_fname" id="teacher_fname" value="{{$teacher->fname}}" placeholder="Juan">
                            </div>
                            <div>
                                <label for="teacher_lname">Teacher Last Name</label>
                                <input type="text" name="teacher_lname" id="teacher_lname" value="{{$teacher->lname}}" placeholder="Dela Cruz">
                            </div>
                            <input type="submit" value="Save">
                            <a href="" rel="modal:close">Cancel</a>
                        </form>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div> --}}

    {{-- STUDENTS TABLE --}}
    {{-- <div>
        <h3>Manager Students</h3>
        <table>
            <thead>
                <th>Student ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>
                            {{$student->id}}
                        </td>
                        <td>
                            {{$student->fname.' '.$student->mname.' '.$student->lname}}
                        </td>
                        <td>
                            {{$student->email}}
                        </td>
                        <td>
                            <a href="#modal{{$student->key}}" rel="modal:open">Edit</a>
                            <a href="/admin/manager/delete/student/{{$student->key}}">Delete</a>
                            <a href="">View</a>
                        </td>
                    </tr>

                    <div id="modal{{$student->key}}" class="modal">
                        <h3>Edit Student</h3>
                        <form action="/admin/manager/edit/student/{{$student->key}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <div>
                                <label for="student_id">Student ID</label>
                                <input type="text" name="student_id" id="student_id" value="{{$student->id}}" placeholder="A24-1234">
                            </div>
                            <div>
                                <label for="student_fname">Student First Name</label>
                                <input type="text" name="student_fname" id="student_fname" value="{{$student->fname}}" placeholder="Juan">
                            </div>
                            <div>
                                <label for="student_mname">Student Middle Name</label>
                                <input type="text" name="student_mname" id="student_mname" value="{{$student->mname}}" placeholder="Doe">
                            </div>
                            <div>
                                <label for="student_lname">Student Last Name</label>
                                <input type="text" name="student_lname" id="student_lname" value="{{$student->lname}}" placeholder="Dela Cruz">
                            </div>
                            <input type="submit" value="Save">
                            <a href="" rel="modal:close">Cancel</a>
                        </form>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div> --}}

    {{-- SEMESTERS TABLE --}}
    <div>
        <h3>Manage Semesters</h3>
        <table>
            <thead>
                <th>Semester Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($sems as $sem)
                    <tr>
                        <td>
                            @php
                                if($sem->number === 1)
                                    echo "1st Semester";
                                else if($sem->number === 2)
                                    echo "2nd Semester";
                                else if($sem->number === 3)
                                    echo "Summer";
                            @endphp
                            {{date("Y",strtotime($sem->start_date)).'-'.date("Y",strtotime($sem->end_date))}}
                        </td>
                        <td>
                            {{$sem->start_date}}
                        </td>
                        <td>
                            {{$sem->end_date}}
                        </td>
                        <td>
                            <a href="#modal{{$teacher->key}}" rel="modal:open">Edit</a>
                            <a href="/admin/manager/delete/teacher/{{$teacher->key}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- SUBJECTS TABLE --}}
    <div>
        <table>
            <thead>
                <th>Subject Code</th>
                <th>Description</th>
                <th>Units</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        <td>
                            {{$subject->code}}
                        </td>
                        <td>
                            {{$subject->description}}
                        </td>
                        <td>
                            {{$subject->units}}
                        </td>
                        <td>
                            {{-- //REVIEW: Put actions here  --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.modal.min.js')}}"></script>
    <script>
        $j = jQuery.noConflict();

        $j("#success_modal").fadeOut(2000);

        $j("#failure_modal").fadeOut(2000);
    </script>
</body>
</html>
