<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Manager</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <link rel="stylesheet" href="{{asset('assets/css/sidebar-template.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/page-content.css')}}">
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">

            {{-- SIDEBAR --}}
            @include('components.admin_sidebar')

            <!-- Main content area -->
            <div class="p-0 col">

                {{-- APPBAR --}}
                @include('components.admin_appbar')

                <!-- Page content -->
                <div class="mt-3 container-fluid page-content">
                    <br><br>

                    @include('components.popup-condition')

                    <div class="mb-3 d-flex">
                        <h5>Student List</h5>
                        <div class="d-flex ms-auto">
                            <form action="/admin/manager/view/class/{{$class->id}}" method="GET">
                                {{-- SEARCH --}}
                                <div class="search-container me-3">
                                    <input type="text" class="form-control" name="search_all_students" placeholder="Search Student..." id="searchInput">
                                </div>
                            </form>
                            <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                                <i class="fas fa-user-plus"></i> Add Student
                            </button>
                        </div>
                    </div>

                    <!-- Teacher's Info Container -->
                    <div class="p-3 mb-4 bg-white teacher-info-container" style="border-radius: 10px; box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.1);">
                        <h5 class="m-0" style="font-size: 1.25em;">{{$class->teacher}}</h5>
                        <div class="mt-1 teacher-details" style="font-size: 0.95em;">
                            <p class="m-0">{{$class->subject}}</p>
                            <p class="m-0" style="color: rgb(209, 27, 27);">{{$class->units}}-units</p>
                        </div>
                    </div>

                    <!-- Table for viewing students -->
                    <div class="table-container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>
                                            <div style="color: rgb(192, 27, 27); font-size: 0.85em;">{{$student->student_id}}</div>
                                            <div>{{$student->name}}</div>
                                        </td>
                                        <td>{{$student->course}}</td>
                                        <td>
                                            @if ($student->year == 0)
                                                Irregular
                                            @elseif ($student->year == 1)
                                                1st Year
                                            @elseif ($student->year == 2)
                                                2nd Year
                                            @elseif ($student->year == 3)
                                                3rd Year
                                            @elseif ($student->year == 4)
                                                4th Year
                                            @endif
                                        </td>
                                        <td><button class="btn btn-action" data-href="/admin/manager/view/class/remove/student/{{$student->id}}/{{$class->id}}" data-bs-toggle="modal" data-bs-target="#deleteStudentModal"><i class="fas fa-trash"></i></button></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        {{-- <nav>
            {{$students->links()}}
        </nav> --}}
    </div>

    {{-- //[ ] ADD STUDENTS --}}
    <!-- Add Student Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/manager/view/class/{{$class->id}}" method="GET">
                        {{-- SEARCH --}}
                        <div class="mb-3">
                            <input type="text" class="form-control" id="search" name="search" placeholder="Search by ID or Name">
                        </div>
                    </form>

                    <form action="/admin/manager/view/class/add/student/{{$class->id}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            {{-- <input type="text" class="form-control" id="studentName" placeholder="Enter student's name"> --}}
                            <select name="year_id" id="studentName" class="form-control">
                                <option value="" selected disabled>Select Student</option>
                                @foreach ($all_students as $student)
                                    <option value="{{$student->year}}">{{$student->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <input type="hidden" name="class_id" value="{{$class->id}}">
                        </div>
                        {{-- <div class="mb-3">
                            <label for="classCourse" class="form-label">Course</label>
                            <select class="form-select" id="classCourse">
                                <option selected>Select Course</option>
                                <option value="Computer Science">Computer Science</option>
                                <option value="Information Technology">Information Technology</option>
                            </select>
                        </div> --}}
                        {{-- <div class="mb-3">
                            <label for="classYear" class="form-label">Year</label>
                            <select class="form-select" id="classYear">
                                <option selected>Select Year</option>
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                            </select>
                        </div> --}}

                        <div class="modal-footer">
                            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-add">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- DELETE MODAL --}}
    @include('components.class_view.delete-modal')

    <script>
        var deleteModalBtn = document.querySelectorAll('[data-bs-target="#deleteStudentModal"]');
        var delBtn = document.querySelector('#deleteStudentBtn');

        // document.querySelectorAll('.btn-danger').forEach(function(button) {
        //     button.addEventListener('click', function(event) {
        //         // const studentId = event.target.getAttribute('data-student-id');
        //         const deleteButton = document.getElementById('deleteStudentBtn');

        //         deleteButton.setAttribute('data-student-id', studentId);
        //     });
        // });

        deleteModalBtn.forEach(function(button){
            button.addEventListener('click',function () {
                var href = button.getAttribute('data-href');

                delBtn.setAttribute('href',href);
            });
        });


        // document.getElementById('deleteStudentBtn').addEventListener('click', function() {
        //     const studentId = this.getAttribute('data-student-id');
        //     console.log(`Student with ID ${studentId} has been deleted.`);

        //     $('#deleteStudentModal').modal('hide');
        // });

        const toastSuccess = new bootstrap.Toast(document.getElementById('toastSuccess'));
        toastSuccess.show();

    </script>
</body>
</html>
