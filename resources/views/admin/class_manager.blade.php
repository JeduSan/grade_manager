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
    <style>

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Sidebar -->
            <div class="col-auto p-0" id="sidebar">
                <div class="d-flex flex-column align-items-center align-items-sm-start text-white min-vh-100">
                    <div class="logo-container">
                        <br><br><br>
                    </div>
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
                    </button>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li>
                            <a href="dashboard.html" class="nav-link px-0 align-middle text-white">
                                <i class="fas fa-tachometer-alt icon-size"></i> <span class="ms-1">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="manage-teacher.html" class="nav-link px-0 align-middle text-white">
                                <i class="fas fa-user icon-size"></i> <span class="ms-1">Manage Teachers</span>
                            </a>
                        </li>
                        <li>
                            <a href="manage-students.html" class="nav-link px-0 align-middle text-white">
                                <i class="fas fa-users icon-size"></i> <span class="ms-1">Manage Students</span>
                            </a>
                        </li>
                        <li>
                            <a href="manage-class.html" class="nav-link px-0 align-middle text-white">
                                <i class="fas fa-chalkboard-teacher icon-size"></i> <span class="ms-1">Manage Class</span>
                            </a>
                        </li>
                        <li>
                            <a href="manage-subjects.html" class="nav-link px-0 align-middle text-white">
                                <i class="fas fa-cogs icon-size"></i> <span class="ms-1">Manage Subjects</span>
                            </a>
                        </li>
                        <li>
                            <a href="manage-users.html" class="nav-link px-0 align-middle text-white">
                                <i class="fas fa-cogs icon-size"></i> <span class="ms-1">Manage Users</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main content area -->
            <div class="col p-0">
                <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
                    <div class="container-fluid d-flex align-items-center">
                        <img src="{{asset('assets/images/logo.png')}}" alt="Logo" class="logo">
                        <p class="logo-name">EUC Grading System</p>
                        <div class="navbar-nav ms-auto">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user-circle profile-icon"></i> Profile
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                                    <li><a class="dropdown-item" href="admin-profile.html">View Profile</a></li>
                                    <li><a class="dropdown-item" href="logout.html">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Page content -->
                <div class="container-fluid page-content mt-3">
                    <br><br>


                    <div class="d-flex mb-3">
                        <h5>Manage Class</h5>


                        <div class="d-flex ms-auto">
                            <div class="search-container me-3">
                                <input type="text" class="form-control" placeholder="Search Class..." id="searchInput">
                            </div>
                            <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addClassModal">
                                <i class="fas fa-user-plus"></i> Add Class
                            </button>
                        </div>
                    </div>

                    @include('components.popup-condition')

                    @include('components.class_manager.add-modal')

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Instructor</th>
                                    <th>Subject</th>
                                    <th>Course</th>
                                    <th>Year</th>
                                    <th>Section</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($classes as $class)
                                <tr>
                                    <td>
                                        @if ($class->teacher != null)
                                            {{$class->teacher}}
                                        @else
                                            <span class="badge bg-warning">TBA</span>
                                        @endif
                                    </td>
                                    <td>{{$class->description}}</td>
                                    <td>{{$class->course}}</td>
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
                                            <span class="badge bg-warning">TBA</span>
                                        @endif
                                    </td>
                                    {{-- //[ ] EDIT ACTIONS --}}
                                    <td>
                                        <button class="btn btn-action" data-bs-toggle="modal" data-bs-target="#editClassModal" data-form="{{$class->id}}" data-instructor="{{$class->teacher_key}}" data-subject="{{$class->subject_key}}" data-course="{{$class->course_id}}" data-year="{{$class->year}}" data-section="{{$class->section}}" data-semester="{{$class->sem_id}}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-action"
                                        onclick="window.location.href='class-list.html';">
                                        <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-action" data-bs-toggle="modal" data-bs-target="#deleteClassModal" data-form="{{$class->id}}" data-instructor="{{$class->teacher}}" data-subject="{{$class->description}}">
                                            <i class="fas fa-trash"></i>
                                        </button>
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

    @include('components.class_manager.edit-modal')

    <!-- Delete Class Modal -->
    <div class="modal fade" id="deleteClassModal" tabindex="-1" aria-labelledby="deleteClassModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteClassModalLabel">Delete Class</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this class <strong id="deleteClassInstructor"></strong> - <span id="deleteClassSubject"></span>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <a id="deleteClassModalBtn" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('toggled');
        });


        var editButtons = document.querySelectorAll('[data-bs-target="#editClassModal"]');
        var deleteButtons = document.querySelectorAll('[data-bs-target="#deleteClassModal"]');
        var editForm = document.querySelector('#editClassForm');
        var deleteClassModalBtn = document.querySelector('#deleteClassModalBtn');

        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var instructor = button.getAttribute('data-instructor');
                var subject = button.getAttribute('data-subject');
                var course = button.getAttribute('data-course');
                var year = button.getAttribute('data-year');
                var section = button.getAttribute('data-section');
                var sem = button.getAttribute('data-semester');
                var form = button.getAttribute('data-form');

                document.getElementById('editClassInstructor').value = instructor;
                document.getElementById('editClassSubject').value = subject;
                document.getElementById('editClassCourse').value = course;
                document.getElementById('editClassYear').value = year;
                document.getElementById('editClassSection').value = section;
                document.getElementById('editClassSemester').value = sem;
                editForm.setAttribute('action','/admin/manager/edit/class/' + form);
            });
        });

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var instructor = button.getAttribute('data-instructor');
                var subject = button.getAttribute('data-subject');
                var form = button.getAttribute('data-form');

                document.getElementById('deleteClassInstructor').innerText = instructor;
                document.getElementById('deleteClassSubject').innerText = subject;
                deleteClassModalBtn.setAttribute('href', '/admin/manager/delete/class/' + form);
            });
        });

        const toastSuccess = new bootstrap.Toast(document.getElementById('toastSuccess'));
        toastSuccess.show();

    </script>
</body>
</html>
