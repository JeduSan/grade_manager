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

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.modal.min.js')}}"></script>
    <script>
        $j = jQuery.noConflict();

        $j("#success_modal").fadeOut(2000);

        $j("#failure_modal").fadeOut(2000);
    </script>
</body>
</html>
