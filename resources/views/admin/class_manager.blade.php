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
                        <a class="navbar-brand ms-auto" href="admin-profile.html">
                            <i class="fas fa-user-circle profile-icon"></i> Profile
                        </a>
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

                    <!-- Modal for adding class -->
                    <div class="modal fade" id="addClassModal" tabindex="-1" aria-labelledby="addClassModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addClassModalLabel">Add New Class</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/admin/manager/add/class" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="instructor" class="form-label">Instructor</label>
                                            <select class="form-select" name="instructor" id="instructor">
                                                <option selected disabled>Select Instructor</option>
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{$teacher->key}}">{{"$teacher->fname $teacher->lname [$teacher->id]" }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="subject" class="form-label">Class Subject</label>
                                            <select class="form-select" name="subject" id="subject">
                                                <option selected disabled>Select Subject</option>
                                                @foreach ($subjects as $subject)
                                                    <option value="{{$subject->key}}">{{"$subject->description [$subject->code]"}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="course" class="form-label">Class Course</label>
                                            <select class="form-select" name="course" id="course">
                                                <option selected>Select Course</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{$course->id}}">{{"[$course->abbr] $course->description"}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="year" class="form-label">Class Year</label>
                                            <select class="form-select" name="year" id="year">
                                                <option selected disabled>Select Year</option>
                                                <option value="1">1st Year</option>
                                                <option value="2">2nd Year</option>
                                                <option value="3">3rd Year</option>
                                                <option value="4">4th Year</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="semester" class="form-label">Semester</label>
                                            <select class="form-select" name="semester" id="semester">
                                                <option selected disabled>Select Semester</option>
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
                                        <div class="mb-3">
                                            <label for="section" class="form-label">Section</label>
                                            <input type="text" class="form-control" name="section" id="section" placeholder="Enter Section">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-add">Save Class</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                        <button class="btn btn-action" data-bs-toggle="modal" data-bs-target="#deleteClassModal" data-instructor="Dr. Aldwin Illumin" data-subject="Parallel and Distributed Computing">
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

    <!-- Edit Class Modal -->
    <div class="modal fade" id="editClassModal" tabindex="-1" aria-labelledby="editClassModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editClassModalLabel">Edit Class Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editClassForm" method="POST">
                        @csrf
                        @method("PATCH")
                        <div class="mb-3">
                            <label for="editClassInstructor" class="form-label">Instructor</label>
                            <select class="form-select" name="instructor" id="editClassInstructor">
                                <option selected disabled>Select Instructor</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{$teacher->key}}">{{"$teacher->fname $teacher->lname [$teacher->id]" }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Class Subject</label>
                            <select class="form-select" name="subject" id="editClassSubject">
                                <option selected disabled>Select Subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{$subject->key}}">{{"$subject->description [$subject->code]"}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="course" class="form-label">Class Course</label>
                            <select class="form-select" name="course" id="editClassCourse">
                                <option selected>Select Course</option>
                                @foreach ($courses as $course)
                                    <option value="{{$course->id}}">{{"[$course->abbr] $course->description"}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="year" class="form-label">Class Year</label>
                            <select class="form-select" name="year" id="editClassYear">
                                <option selected disabled>Select Year</option>
                                <option value="1">1st Year</option>
                                <option value="2">2nd Year</option>
                                <option value="3">3rd Year</option>
                                <option value="4">4th Year</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <select class="form-select" name="semester" id="editClassSemester">
                                <option selected disabled>Select Semester</option>
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
                        <div class="mb-3">
                            <label for="section" class="form-label">Section</label>
                            <input type="text" class="form-control" name="section" id="editClassSection" placeholder="Enter Section">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-add">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                    <button type="button" class="btn btn-danger">Delete</button>
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

                document.getElementById('deleteClassInstructor').innerText = instructor;
                document.getElementById('deleteClassSubject').innerText = subject;
            });
        });
    </script>
</body>
</html>
