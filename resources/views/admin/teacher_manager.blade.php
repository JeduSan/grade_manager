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

                <!-- Page content -->
                <div class="container-fluid page-content mt-3">
                    <br><br>

                    {{-- APPBAR --}}
                    @include('components.admin_appbar')

                    <div class="d-flex mb-3">
                        <h5>Manage Teachers</h5>

                        <div class="d-flex ms-auto">

                            <form method="GET">
                                <div class="search-container me-3">
                                    <input type="text" class="form-control" name="search" placeholder="Search teacher..." id="searchInput">
                                </div>
                            </form>

                            <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addTeacherModal">
                                <i class="fas fa-user-plus"></i> Add Teacher
                            </button>
                        </div>
                    </div>

                    {{-- POPUP --}}
                    @include('components.popup-condition')

                    {{-- ADD TEACHER MODAL --}}
                    @include('components.teacher_manager.add-modal')

                    <!-- Table -->
                    <div class="table-container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Teacher ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($teachers as $teacher)

                                    <tr>
                                        <td>{{$teacher->id}}</td>
                                        <td>{{$teacher->fname." ".$teacher->lname}}</td>
                                        <td>{{$teacher->email}}</td>
                                        <td>{{str_replace('College of','',$teacher->dept)}}</td>
                                        <td>
                                            <button class="btn btn-action" data-bs-toggle="modal" data-bs-target="#editTeacherModal" data-form="{{$teacher->user_id}}" data-id="{{$teacher->id}}" data-fname="{{$teacher->fname}}" data-lname="{{$teacher->lname}}" data-email="{{$teacher->email}}" data-dept="{{$teacher->dept_id}}"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-action" data-form="{{$teacher->user_id}}" data-bs-toggle="modal" data-bs-target="#deleteTeacherModal"><i class="fas fa-trash"></i></button>
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

    {{-- EDIT TEACHER MODAL --}}
    @include('components.teacher_manager.edit-modal')

    {{-- DELETE TEACHER MODAL --}}
    @include('components.teacher_manager.delete-modal')

    <script>
        var editModalBtns = document.querySelectorAll('[data-bs-target="#editTeacherModal"]');
        var deleteButtons = document.querySelectorAll('[data-bs-target="#deleteTeacherModal"]');
        var deleteClassModalBtn = document.querySelector('#deleteClassModalBtn');
        var editForm = document.querySelector('#editForm');

        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('toggled');
        });

        function showSuccessMessage(message) {
            const toastSuccess = new bootstrap.Toast(document.getElementById('toastSuccess'));
            document.querySelector('#toastSuccess .toast-body').textContent = message;
            toastSuccess.show();
        }

        editModalBtns.forEach(function (button) {
            button.addEventListener('click',function () {
                var id = button.getAttribute('data-id');
                var fname = button.getAttribute('data-fname');
                var lname = button.getAttribute('data-lname');
                var email = button.getAttribute('data-email');
                var dept = button.getAttribute('data-dept');
                var form = button.getAttribute('data-form');

                // alert(`${id} - ${fname} - ${lname} - ${email} - ${dept}`);
                document.getElementById('teacher-id').value = id;
                document.getElementById('teacherFirstName').value = fname;
                document.getElementById('teacherLastName').value = lname;
                document.getElementById('teacher-email').value = email;
                document.getElementById('teacher-dept').value = dept;
                editForm.setAttribute('action', '/admin/manager/edit/teacher/' + form);

            });
        });

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var form = button.getAttribute('data-form');

                deleteClassModalBtn.setAttribute('href', '/admin/manager/delete/teacher/' + form);
            });
        });

        const toastSuccess = new bootstrap.Toast(document.getElementById('toastSuccess'));
        toastSuccess.show();

    </script>

</body>
</html>
