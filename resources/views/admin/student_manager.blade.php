<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Student Manager</title>
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

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.modal.min.js')}}"></script>
    <script>
        $j = jQuery.noConflict();

        $j("#success_modal").fadeOut(2000);

        $j("#failure_modal").fadeOut(2000);
    </script>
</body>
</html>
