<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard</title>
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
            <div class="col p-0">

                {{-- APPBAR --}}
                @include('components.admin_appbar')

                <!-- Page content -->
                <div class="container-fluid page-content mt-3">
                    <br><br>

                    <div class="d-flex mb-3">
                        <h5>Manage Students</h5>

                        <div class="d-flex ms-auto">
                            <form method="GET">
                                <div class="search-container me-3">
                                    <input type="text" class="form-control" name="search" placeholder="Search Students..." id="searchInput">
                                </div>
                            </form>
                            <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                                <i class="fas fa-user-plus"></i> Add Students
                            </button>
                        </div>
                    </div>

                    {{-- POPUP --}}
                    @include('components.popup-condition')

                    {{-- ADD MODAL --}}
                    @include('components.student_manager.add-modal')

                    <!-- Table for managing students -->
                    <div class="table-container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>Year</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)

                                    <tr>
                                        <td>{{$student->id}}</td>
                                        <td>{{$student->fname." ".$student->mname." ".$student->lname}}</td>
                                        <td>{{$student->email}}</td>
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
                                        <td>
                                            <button class="btn btn-action" data-bs-toggle="modal" data-form="{{$student->user_id}}" data-id="{{$student->id}}" data-fname="{{$student->fname}}" data-mname="{{$student->mname}}" data-lname="{{$student->lname}}" data-email="{{$student->email}}" data-course="{{$student->course_id}}" data-year="{{$student->year}}" data-bs-target="#editStudentModal"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-action" data-form="{{$student->user_id}}" data-bs-toggle="modal" data-bs-target="#deleteStudentModal"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- EDIT MODAL --}}
    @include('components.student_manager.edit-modal')


    {{-- DELETE MODAL --}}
    @include('components.student_manager.delete-modal')

    <script>
        var deleteClassModalBtn = document.querySelector('#deleteClassModalBtn');
        var deleteButtons = document.querySelectorAll('[data-bs-target="#deleteStudentModal"]');
        var editButtons = document.querySelectorAll('[data-bs-target="#editStudentModal"]');
        var editForm = document.querySelector('#editForm');

        editButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var form = button.getAttribute('data-form');
                var id = button.getAttribute('data-id');
                var fname = button.getAttribute('data-fname');
                var mname = button.getAttribute('data-mname');
                var lname = button.getAttribute('data-lname');
                var email = button.getAttribute('data-email');
                var course = button.getAttribute('data-course');
                var year = button.getAttribute('data-year');

                // alert(`${form} - ${id} - ${fname} - ${mname} - ${lname} - ${email} - ${course} - ${year}`);
                editForm.setAttribute('action','/admin/manager/edit/student/' + form);
                document.getElementById('editStudentID').value = id;
                document.getElementById('editStudentFName').value = fname;
                document.getElementById('editStudentMName').value = mname;
                document.getElementById('editStudentLName').value = lname;
                document.getElementById('editStudentEmail').value = email;
                document.getElementById('editStudentCourse').value = course;
                document.getElementById('editStudentYear').value = year;
            });
        });

        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('toggled');
        });

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var form = button.getAttribute('data-form');

                deleteClassModalBtn.setAttribute('href', '/admin/manager/delete/student/' + form);
            });
        });

        const toastSuccess = new bootstrap.Toast(document.getElementById('toastSuccess'));
        toastSuccess.show();

    </script>

</body>
</html>
