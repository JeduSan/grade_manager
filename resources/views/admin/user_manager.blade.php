<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard - Manage Admins</title>
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
                        <h5>Manage Users</h5>

                        <div class="d-flex ms-auto">
                            <form method="GET">
                                <div class="search-container me-3">
                                    <input type="text" name="search" class="form-control" placeholder="Search Admins..." id="searchInput">
                                </div>
                            </form>
                            <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addAdminModal">
                                <i class="fas fa-user-plus"></i> Add Admins
                            </button>
                        </div>
                    </div>

                    {{-- ADD MODAL --}}
                    @include('components.user_manager.add-modal')

                    <!-- Table for managing admins -->
                    <div class="table-container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>Admin</td>
                                        <td>
                                            <button class="btn btn-action" data-bs-toggle="modal" data-bs-target="#editAdminModal"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-action" data-bs-toggle="modal" data-bs-target="#deleteAdminModal"><i class="fas fa-trash"></i></button>
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

    <!-- Edit Admin Modal -->
    <div class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="editAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAdminModalLabel">Edit Admin Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="editAdminName" placeholder="Enter admin's name">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="editAdminEmail" placeholder="Enter admin's email">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="editAdminRole" placeholder="Enter admin's role">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="editAdminPassword" placeholder="Enter admin's password">
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

    <!-- Delete Admin Confirmation Modal -->
    <div class="modal fade" id="deleteAdminModal" tabindex="-1" aria-labelledby="deleteAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAdminModalLabel">Delete Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this admin's record?</p>
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
    </script>

</body>
</html>
