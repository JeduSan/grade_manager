<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Grade Manager</title>
    <link rel="stylesheet" href="{{asset('assets/css/jquery.modal.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <!-- Add Semester -->
    <div>
        <h3>Add Semester</h3>
        <form action="/admin/manager/add/semester" method="POST">
            @csrf
            <div>
                <label for="semester">Semester</label>
                <select name="semester" id="semester" required>
                    <option value="" selected disabled>Select Semester</option>
                    <option value="1">First Semester</option>
                    <option value="2">Second Semester</option>
                    <option value="3">Summer</option>
                </select>
            </div>
            <div>
                <label for="semester_start">Semester Start Date</label>
                <input type="date" name="semester_start" id="semester_start"  value="{{old('semester_start')}}" required>
            </div>
            <div>
                <label for="semester_end">Semester End Date</label>
                <input type="date" name="semester_end" id="semester_end"  value="{{old('semester_end')}}" required>
            </div>
            <div>
                <input type="submit" value="Add Semester">
            </div>
        </form>
    </div>

    {{-- SEMESTERS TABLE --}}
    <div>
        <h3>Manage Semesters</h3>

        <p>NOTE: Only newly added semester without any assigned classes are available for deletion</p>

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
                            {{date("Y",strtotime($acad_year->start_date)).'-'.date("Y",strtotime($acad_year->end_date))}}
                        </td>
                        <td>
                            {{$sem->start_date}}
                        </td>
                        <td>
                            {{$sem->end_date}}
                        </td>
                        <td>
                            {{-- <a href="#modal{{$sem->id}}" rel="modal:open">Edit</a> --}}
                            <a href="/admin/manager/delete/semester/{{$sem->id}}">Delete</a>
                        </td>
                    </tr>

                    {{-- <div id="modal{{$sem->id}}" class="modal">
                        <h3>Edit Semester</h3>
                        <form action="/admin/manager/edit/semester/{{$student->key}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <div>
                                <label for="semester">Semester</label>
                                <select name="semester" id="semester" required>
                                    <option value="" selected disabled>Select Semester</option>
                                    <option value="1">First Semester</option>
                                    <option value="2">Second Semester</option>
                                    <option value="3">Summer</option>
                                </select>
                            </div>
                            <div>
                                <label for="semester_start">Semester Start Date</label>
                                <input type="date" name="semester_start" id="semester_start"  value="{{old('semester_start')}}" required>
                            </div>
                            <div>
                                <label for="semester_end">Semester End Date</label>
                                <input type="date" name="semester_end" id="semester_end"  value="{{old('semester_end')}}" required>
                            </div>
                            <div>
                                <input type="submit" value="Save">
                            </div>
                            <a href="" rel="modal:close">Cancel</a>
                        </form>
                    </div> --}}
                @endforeach
            </tbody>
        </table>
    </div>

    <nav>
        {{ $sems->links() }}
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.modal.min.js')}}"></script>
    <script>
        $j = jQuery.noConflict();

        $j("#success_modal").fadeOut(5000);

        $j("#failure_modal").fadeOut(5000);
    </script>
</body>
</html>
