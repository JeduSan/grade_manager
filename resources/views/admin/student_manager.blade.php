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
                                            <button class="btn btn-action" data-bs-toggle="modal" data-bs-target="#editStudentModal"><i class="fas fa-edit"></i></button>
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

    <!-- Edit Student Modal -->
    <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStudentModalLabel">Edit Student Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="editStudentName" placeholder="Enter student's name">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="editStudentEmail" placeholder="Enter student's email">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="editStudentID" placeholder="Enter student ID">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="editStudentCourse" placeholder="Enter student's course">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="editStudentYear" placeholder="Enter student's year">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="studentPassword" placeholder="Enter student's password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-add">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Student Confirmation Modal -->
    <div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStudentModalLabel">Delete Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this student's record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
                    <a class="btn btn-danger" id="deleteClassModalBtn">Delete</a>
                </div>
            </div>
        </div>
    </div>


    <script>
        var deleteClassModalBtn = document.querySelector('#deleteClassModalBtn');
        var deleteButtons = document.querySelectorAll('[data-bs-target="#deleteStudentModal"]');

        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('toggled');
        });

        const toastSuccess = new bootstrap.Toast(document.getElementById('toastSuccess'));
        toastSuccess.show();

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var form = button.getAttribute('data-form');

                deleteClassModalBtn.setAttribute('href', '/admin/manager/delete/student/' + form);
            });
        });

    </script>

</body>
</html>
