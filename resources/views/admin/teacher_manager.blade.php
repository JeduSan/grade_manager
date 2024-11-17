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
                                            <button class="btn btn-action" data-bs-toggle="modal" data-bs-target="#editTeacherModal"><i class="fas fa-edit"></i></button>
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

    <!-- Edit Teacher Modal -->
    <div class="modal fade" id="editTeacherModal" tabindex="-1" aria-labelledby="editTeacherModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTeacherModalLabel">Edit Teacher Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="editTeacherName" placeholder="Enter teacher's name">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="editTeacherEmail" placeholder="Enter teacher's email">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="editTeacherDepartment" placeholder="Enter teacher's department">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="teacherPassword" placeholder="Create Password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-add" onclick="showSuccessMessage('Teacher details updated successfully!')">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- DELETE TEACHER MODAL --}}
    @include('components.teacher_manager.delete-modal')

    <script>
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('toggled');
        });

        // document.getElementById('searchButton').addEventListener('click', function() {
        //     const searchTerm = document.getElementById('searchInput').value;
        //     console.log('Search term:', searchTerm);
        // });

        function showSuccessMessage(message) {
            const toastSuccess = new bootstrap.Toast(document.getElementById('toastSuccess'));
            document.querySelector('#toastSuccess .toast-body').textContent = message;
            toastSuccess.show();
        }

        // function showErrorMessage(message) {
        //     const toastError = new bootstrap.Toast(document.getElementById('toastError'));
        //     document.querySelector('#toastError .toast-body').textContent = message;
        //     toastError.show();
        // }
        var deleteButtons = document.querySelectorAll('[data-bs-target="#deleteTeacherModal"]');
        var deleteClassModalBtn = document.querySelector('#deleteClassModalBtn');
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
