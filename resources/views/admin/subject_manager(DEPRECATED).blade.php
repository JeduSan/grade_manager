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

    {{-- Add Subject - Excel --}}
    <div>
        <form action="/admin/manager/add/subject/excel" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="excel">Upload File</label>
            <input type="file" name="excel" id="excel" required>
            <x-input-error :messages="$errors->get('excel')" class="mt-2" />
            <input type="submit" value="Submit">
        </form>
    </div>

    <!-- Add Subject -->
    <div>
        <h3>Add Subject</h3>
        <form action="/admin/manager/add/subject" method="POST">
            @csrf
            <div>
                <label for="subject_name">Subject Name</label>
                <input type="text" name="subject_name" id="subject_name" placeholder="Software Engineering 1" value="{{old('subject_name')}}"
                    required>
            </div>
            <div>
                <label for="subject_code">Subject Code</label>
                <input type="text" name="subject_code" id="subject_code" placeholder="CCS123" value="{{old('subject_code')}}" required>
            </div>
            <div>
                <label for="subject_units">Subject Units</label>
                <input type="text" name="subject_units" id="subject_units" placeholder="5" value="{{old('subject_units')}}" required>
            </div>
            <div>
                <input type="submit" value="Add Subject">
            </div>
        </form>
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
                            <a href="#modal{{$subject->key}}" rel="modal:open">Edit</a>
                            <a href="/admin/manager/delete/subject/{{$subject->key}}">Delete</a>
                        </td>
                    </tr>

                    <div id="modal{{$subject->key}}" class="modal">
                        <h3>Edit Semester</h3>
                        <form action="/admin/manager/edit/subject/{{$subject->key}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <div>
                                <label for="subject_name">Subject Name</label>
                                <input type="text" name="subject_name" id="subject_name" placeholder="Software Engineering 1" value="{{$subject->description}}"
                                    required>
                            </div>
                            <div>
                                <label for="subject_code">Subject Code</label>
                                <input type="text" name="subject_code" id="subject_code" placeholder="CCS123" value="{{$subject->code}}" required>
                            </div>
                            <div>
                                <label for="subject_units">Subject Units</label>
                                <input type="text" name="subject_units" id="subject_units" placeholder="5" value="{{$subject->units}}" required>
                            </div>
                            <div>
                                <input type="submit" value="Save">
                            </div>
                            <a href="" rel="modal:close">Cancel</a>
                        </form>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <nav>
        {{ $subjects->links() }}
    </nav>

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.modal.min.js')}}"></script>
    <script>
        $j = jQuery.noConflict();

        $j("#success_modal").fadeOut(5000);

        $j("#failure_modal").fadeOut(5000);
    </script>
</body>
</html>
