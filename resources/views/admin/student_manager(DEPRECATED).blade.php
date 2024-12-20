<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Student Manager</title>
    <link rel="stylesheet" href="{{asset('assets/css/jquery.modal.min.css')}}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
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

    {{-- Add Subject - Excel --}}
    <div>
        <form action="/admin/manager/add/student/excel" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="excel">Upload File</label>
            <input type="file" name="excel" id="excel" required>
            <x-input-error :messages="$errors->get('excel')" class="mt-2" />
            <input type="submit" value="Submit">
        </form>
    </div>

    <!-- Add Student -->
    <div>
        <h3>Add Student</h3>
        <form action="/admin/manager/add/student" method="POST">
            @csrf
            <div>
                <label for="student_id">Student ID</label>
                <input type="text" name="student_id" id="student_id" placeholder="A24-1234" value="{{old('student_id')}}" required>
                <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
            </div>
            <div>
                <label for="student_fname">Student First Name</label>
                <input type="text" name="student_fname" id="student_fname" placeholder="Juan" value="{{old('student_fname')}}" required>
                <x-input-error :messages="$errors->get('student_fname')" class="mt-2" />
            </div>
            <div>
                <label for="student_mname">Student Middle Name</label>
                <input type="text" name="student_mname" id="student_mname" placeholder="Doe" value="{{old('student_mname')}}" required>
                <x-input-error :messages="$errors->get('student_mname')" class="mt-2" />
            </div>
            <div>
                <label for="student_lname">Student Last Name</label>
                <input type="text" name="student_lname" id="student_lname" placeholder="Dela Cruz" value="{{old('student_lname')}}" required>
                <x-input-error :messages="$errors->get('student_lname')" class="mt-2" />
            </div>
            <div>
                <label for="student_email">Student Email</label>
                <input type="email" name="student_email" id="student_email" placeholder="juan@example.com" value="{{old('student_email')}}"
                    required>
                <x-input-error :messages="$errors->get('student_email')" class="mt-2" />
            </div>
            <div>
                <label for="student_course">Student Course</label>
                <!-- [ ] Fill this with courses from the database-->
                <select name="student_course" id="student_course">
                    <option value="" selected disabled>Select Course</option>
                    @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->description }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('student_course')" class="mt-2" />
            </div>
            <div>
                <label for="student_year">Student Year</label>
                <select name="student_year" id="student_year">
                    <option value="" selected disabled>Select Year</option>
                    <option value="0">Irregular</option>
                    <option value="1">1st Year</option>
                    <option value="2">2nd Year</option>
                    <option value="3">3rd Year</option>
                    <option value="4">4th Year</option>
                </select>
                <x-input-error :messages="$errors->get('student_year')" class="mt-2" />
            </div>
            <div>
                <input type="submit" value="Add Student">
            </div>
        </form>
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
                                <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
                            </div>
                            <div>
                                <label for="student_fname">Student First Name</label>
                                <input type="text" name="student_fname" id="student_fname" value="{{$student->fname}}" placeholder="Juan">
                                <x-input-error :messages="$errors->get('student_fname')" class="mt-2" />
                            </div>
                            <div>
                                <label for="student_mname">Student Middle Name</label>
                                <input type="text" name="student_mname" id="student_mname" value="{{$student->mname}}" placeholder="Doe">
                                <x-input-error :messages="$errors->get('student_mname')" class="mt-2" />
                            </div>
                            <div>
                                <label for="student_lname">Student Last Name</label>
                                <input type="text" name="student_lname" id="student_lname" value="{{$student->lname}}" placeholder="Dela Cruz">
                                <x-input-error :messages="$errors->get('student_lname')" class="mt-2" />
                            </div>
                            <div>
                                <label for="student_email">Student Email</label>
                                <input type="email" name="student_email" id="student_email" value="{{$student->email}}" placeholder="juan@example.com">
                                <x-input-error :messages="$errors->get('student_email')" class="mt-2" />
                            </div>
                            <input type="submit" value="Save">
                            <a href="" rel="modal:close">Cancel</a>
                        </form>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <nav>
        {{ $students->links() }}
    </nav>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.modal.min.js')}}"></script>
    <script>
        $j = jQuery.noConflict();

        $j("#success_modal").fadeOut(5000);

        $j("#failure_modal").fadeOut(5000);
    </script>
</body>
</html>
