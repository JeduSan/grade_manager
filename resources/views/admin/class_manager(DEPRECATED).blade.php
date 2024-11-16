<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Class Manager</title>
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

    <div>
        <form action="/admin/manager/add/class" method="POST">
            @csrf

            <div>
                {{-- //[x] RETRIEVE TEACHERS --}}
                <label for="instructor">Instructor</label>
                <select name="instructor" id="instructor" required>
                    <option value="" selected disabled>Select Instructor</option>

                    @foreach ($teachers as $teacher)
                        <option value="{{$teacher->key}}">{{"$teacher->fname $teacher->lname [$teacher->id]" }}</option>
                    @endforeach

                </select>
            </div>

            <div>
                {{-- //[x] RETRIEVE SUBJECTS --}}
                <label for="subject">Subject</label>
                <select name="subject" id="subject" required>
                    <option value="" selected disabled>Select Subject</option>

                    @foreach ($subjects as $subject)
                        <option value="{{$subject->key}}">{{"$subject->description [$subject->code]"}}</option>
                    @endforeach

                </select>
            </div>

            <div>
                {{-- //[x] RETRIEVE COURSES --}}
                <label for="course">Course</label>
                <select name="course" id="course" required>
                    <option value="" selected disabled>Select Course</option>

                    @foreach ($courses as $course)
                        <option value="{{$course->id}}">{{"[$course->abbr] $course->description"}}</option>
                    @endforeach

                </select>
            </div>

            <div>
                <label for="year">Year</label>
                <select name="year" id="year" required>
                    <option value="" selected disabled>Select Year</option>
                    {{-- <option value="0">Irregular</option> --}}
                    <option value="1">1st Year</option>
                    <option value="2">2nd Year</option>
                    <option value="3">3rd Year</option>
                    <option value="4">4th Year</option>
                </select>
            </div>

            <div>
                <label for="semester">Semester</label>
                <select name="semester" id="semester" required>
                    <option value="" selected disabled>Select Semester</option>

                    @foreach ($semesters as $sem)
                        <option value="{{$sem->id}}">
                        @if ($sem->number == 1)
                            {{"1st Semester AY $sem->start_year-$sem->end_year"}}
                        @elseif ($sem->number == 2)
                            {{"2nd Semester AY $sem->start_year-$sem->end_year"}}
                        @elseif ($sem->number == 3)
                            {{"Summer AY $sem->start_year-$sem->end_year"}}
                        @endif
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="section">Section Code</label>
                <input type="text" name="section" id="section" placeholder="LA1234">
            </div>

            <div>
                <input type="submit" value="Add Class">
            </div>

        </form>
    </div>

    {{-- CLASS TABLE --}}
    <div>
        <table>
            <thead>
                <th>Instructor</th>
                <th>Subject</th>
                <th>Course</th>
                <th>Year</th>
                <th>Section</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($classes as $class)
                    <tr>
                        <td>
                            @if ($class->teacher != null)
                                {{$class->teacher}}
                            @else
                                TBA
                            @endif
                        </td>
                        <td>
                            {{$class->description}}
                        </td>
                        <td>
                            {{$class->course}}
                        </td>
                        <td>
                            @if ($class->year == 1)
                                {{ '1st Year' }}
                            @elseif ($class->year == 2)
                                {{ '2nd Year' }}
                            @elseif ($class->year == 3)
                                {{ '3rd Year' }}
                            @elseif ($class->year == 4)
                                {{ '4th Year' }}
                            @endif
                        </td>
                        <td>
                            @if ($class->section != null)
                                {{$class->section}}
                            @else
                                TBA
                            @endif
                        </td>
                        <td>
                            {{-- ACTIONS HERE --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    {{-- <script src="{{asset('assets/js/jquery.modal.min.js')}}"></script> --}}
    <script>
        $j = jQuery.noConflict();

        $j("#success_modal").fadeOut(5000);

        $j("#failure_modal").fadeOut(5000);
    </script>
</body>
</html>
