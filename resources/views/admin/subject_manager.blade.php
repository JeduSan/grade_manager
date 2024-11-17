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

                {{-- POPUP --}}
                @include('components.popup-condition')

                <!-- Page content -->
                <div class="container-fluid page-content mt-3">
                    <br><br>

                    <div class="d-flex mb-3">
                        <h5>Manage Subjects</h5>

                        <div class="d-flex ms-auto">
                            <form method="GET">
                                <div class="search-container me-3">
                                    <input type="text" class="form-control" name="search" placeholder="Search Subjects..." id="searchInput">
                                </div>
                            </form>
                            <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addSubjectModal">
                                <i class="fas fa-user-plus"></i> Add Subjects
                            </button>
                        </div>
                    </div>

                    {{-- ADD MODAL --}}
                    @include('components.subject_manager.add-modal')

                    <!-- Table for managing subjects -->
                    <div class="table-container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Subject Code</th>
                                    <th>Subject Name</th>
                                    <th>Units</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td>{{$subject->code}}</td>
                                        <td>{{$subject->description}}</td>
                                        <td>{{$subject->units}}</td>
                                        <td>
                                            <button class="btn btn-action" data-id="{{$subject->key}}" data-code="{{$subject->code}}" data-description="{{$subject->description}}" data-units="{{$subject->units}}" data-bs-toggle="modal" data-bs-target="#editSubjectModal"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-action" data-id="{{$subject->key}}" data-bs-toggle="modal" data-bs-target="#deleteSubjectModal"><i class="fas fa-trash"></i></button>
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
    @include('components.subject_manager.edit-modal')

    {{-- DELETE MODAL --}}
    @include('components.subject_manager.delete-modal')


    <script>
        var deleteButtons = document.querySelectorAll('[data-bs-target="#deleteSubjectModal"]');
        var deleteModalBtn = document.querySelector('#deleteSubjectModalBtn');
        var editForm = document.querySelector('#editForm');
        var editButtons = document.querySelectorAll('[data-bs-target="#editSubjectModal"]');

        editButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var id = button.getAttribute('data-id');
                var code = button.getAttribute('data-code');
                var name = button.getAttribute('data-description');
                var units = button.getAttribute('data-units');

                // alert(`${id} - ${code} - ${name} - ${units}`);

                document.getElementById('editSubjectCode').value = code;
                document.getElementById('editSubjectName').value = name;
                document.getElementById('editSubjectUnits').value = units;
                editForm.setAttribute('action','/admin/manager/edit/subject/' + id);
            });
        });

        deleteButtons.forEach(function (button) {
            button.addEventListener('click',function () {
                var id = button.getAttribute('data-id');

                deleteModalBtn.setAttribute('href','/admin/manager/delete/subject/' + id);
            });
        });

        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('toggled');
        });

        const toastSuccess = new bootstrap.Toast(document.getElementById('toastSuccess'));
        toastSuccess.show();
    </script>

</body>
</html>
