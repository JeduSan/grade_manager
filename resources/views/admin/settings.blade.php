<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Manager</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo.png')}}">
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

                {{-- POPUP --}}
                @include('components.popup-condition')

                <!-- Page content -->
                <div class="mt-3 container-fluid page-content">
                    <br><br>

                    <div class="mb-3 d-flex">
                        <h5>Semesters for AY {{$acad_year->year ?? "[Please, register new A.Y.]"}}</h5>

                        <div class="d-flex ms-auto">
                            {{-- <form method="GET">
                                <div class="search-container me-3">
                                    <input type="text" name="search" class="form-control" placeholder="Search Admins..." id="searchInput">
                                </div>
                            </form> --}}

                            <form action="/admin/settings/add/academic_year" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-add me-3" title="Toggle when a new academic year has begun to register the new school year">
                                    <i class="fas fa-user-plus"></i> Update Academic Year
                                </button>
                            </form>

                            <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addAdminModal">
                                <i class="fas fa-user-plus"></i> Add Semester
                            </button>
                        </div>
                    </div>

                    {{-- ADD MODAL --}}
                    @include('components.semester_manager.add-modal')

                    <!-- Table for managing admins -->
                    <div class="table-container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($sems as $sem)
                                    <tr>


                                        <td>
                                            @if ($sem->number == 1)
                                                1st Semester
                                            @elseif ($sem->number == 2)
                                                2nd Semester
                                            @elseif ($sem->number == 3)
                                                Summer
                                            @endif
                                        </td>
                                        <td>{{$sem->start}}</td>
                                        <td>{{$sem->end}}</td>
                                        <td>
                                            {{-- <button class="btn btn-action" data-id="{{$sem->id}}" data-name="" data-email="" data-bs-toggle="modal" data-bs-target="#editAdminModal"><i class="fas fa-edit"></i></button> --}}
                                            <button class="btn btn-action" data-id="{{$sem->id}}" data-bs-toggle="modal" data-bs-target="#deleteAdminModal"><i class="fas fa-trash"></i></button>
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
    {{-- @include('components.user_manager.edit-modal') --}}

    {{-- DELETE MODAL --}}
    @include('components.semester_manager.delete-modal')

    <script>
        var deleteUserModalBtn = document.querySelector('#deleteUserModalBtn');
        var deleteButtons = document.querySelectorAll('[data-bs-target="#deleteAdminModal"]');
        // var editButtons = document.querySelectorAll('[data-bs-target="#editAdminModal"]');
        // var editForm = document.querySelector('#editForm');

        // editButtons.forEach(function (button) {
        //     button.addEventListener('click',function () {
        //         var id = button.getAttribute('data-id');
        //         var name = button.getAttribute('data-name');
        //         var email = button.getAttribute('data-email');

        //         // alert(`${id} - ${name} - ${email}`);

        //         document.getElementById('editAdminName').value = name;
        //         document.getElementById('editAdminEmail').value = email;
        //         editForm.setAttribute('action','/admin/manager/edit/user/' + id);
        //     });
        // });

        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var id = button.getAttribute('data-id');

                // alert(id);
                // deleteUserModalBtn.setAttribute('href','/admin/manager/delete/user/' + id);
                deleteUserModalBtn.setAttribute('action','/admin/settings/delete/sem/' + id);

            });
        });

        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('toggled');
        });

        // function showPassword(inputId) {
        //     var password = document.getElementById(inputId);

        //     if(password.type == 'password') {
        //         password.type = 'text';
        //     } else if(password.type == 'text') {
        //         password.type = 'password'
        //     }
        // }

        const toastSuccess = new bootstrap.Toast(document.getElementById('toastSuccess'));
        toastSuccess.show();
    </script>

</body>
</html>
