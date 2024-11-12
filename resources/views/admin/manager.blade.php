<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Manager</title>
</head>
<body>
    {{-- TEACHERS TABLE --}}
    <div>
        <h3>Manage Teacher</h3>
        <table>
            <thead>
                <th>Teacher ID</th>
                <th>Name</th>
                {{-- <th>Email</th> --}}
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
                            {{-- //REVIEW: Put actions here  --}}
                            <a href="">Edit</a>
                            <a href="/admin/manager/delete/teacher/{{$teacher->key}}">Delete</a>
                            <a href="">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- STUDENTS TABLE --}}
    <div>
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
                            {{-- //REVIEW: Put actions here  --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

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
                            {{-- //REVIEW: Put actions here  --}}
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

</body>
</html>
