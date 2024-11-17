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
                        <h5>Manage Class</h5>


                        <div class="d-flex ms-auto">

                            <form method="GET">
                                <div class="search-container me-3">
                                    <input type="text" class="form-control" name="search" placeholder="Search Class..." id="searchInput">
                                </div>
                            </form>

                            <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addClassModal">
                                <i class="fas fa-user-plus"></i> Add Class
                            </button>
                        </div>
                    </div>

                    {{-- SUCCESS FAILURE POPUP --}}
                    @include('components.popup-condition')

                    {{-- ADD MODAL --}}
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
                                        {{-- // [ ] ADD CLAS VIEWING--}}
                                        <a class="btn btn-action" href="/admin/manager/view/class/{{$class->id}}">
                                        <i class="fas fa-eye"></i>
                                        </a>
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

        {{-- <nav>
            {{$classes->links()}}
        </nav> --}}
    </div>

    {{-- EDIT MODAL --}}
    @include('components.class_manager.edit-modal')

    {{-- DELETE MODAL --}}
    @include('components.class_manager.delete-modal')

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
