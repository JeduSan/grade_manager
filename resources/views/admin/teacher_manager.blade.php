<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Manager</title>
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

    {{-- Add Teacher - Excel --}}
    <div>
        <form action="/admin/manager/add/teacher/excel" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="excel">Upload File</label>
            <input type="file" name="excel" id="excel" required>
            <x-input-error :messages="$errors->get('excel')" class="mt-2" />
            <input type="submit" value="Submit">
        </form>
    </div>

    <!-- Add Teacher -->
    <div>
        <h3>Add Teacher</h3>
        <form action="/admin/manager/add/teacher" method="POST">
            @csrf
            <div>
                <label for="teacher_id">Teacher ID</label>
                <input type="text" name="teacher_id" id="teacher_id" placeholder="XMPL1234" value="{{old('teacher_id')}}" required>
            </div>
            <div>
                <label for="teacher_fname">Teacher First Name</label>
                <input type="text" name="teacher_fname" id="teacher_fname" placeholder="Juan" value="{{old('teacher_fname')}}" required>
            </div>
            <div>
                <label for="teacher_lname">Teacher Last Name</label>
                <input type="text" name="teacher_lname" id="teacher_lname" placeholder="Dela Cruz" value="{{old('teacher_lname')}}" required>
            </div>
            <div>
                <input type="submit" value="Add Teacher">
            </div>
        </form>
    </div>

    {{-- TEACHERS TABLE --}}
    <div>
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
    </div>

    <nav>
        {{ $teachers->links() }}
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
