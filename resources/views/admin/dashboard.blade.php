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
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-user-md"></i>
                                    <h5 class="card-title"> Total Teachers</h5>
                                    <strong> <span class="card-number">{{$teacher_count}}</span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-procedures"></i>
                                    <h5 class="card-title"> Total Students</h5>
                                   <strong> <span class="card-number">{{$student_count}}</span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-calendar-check"></i>
                                    <h5 class="card-title">Total Sections</h5>
                                    <strong> <span class="card-number">22</span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">

                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-calendar-alt"></i>
                                    <h5 class="card-title">Current Semester</h5>
                                    <strong> <span class="card-number">1st Semester 2024-2025</span></strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Class Sections Table -->
                    <h5>Pending Class Sections</h5>
                    <div class="table-container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Subject Name</th>
                                    <th>Section</th>
                                    <th>Assigned Teacher</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ECS 103</td>
                                    <td>LAW1RB</td>
                                    <td><span class="text-danger">Not Assigned</span></td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                  <td>ECS 103</td>
                                  <td>LAW1RB</td>
                                  <td><span class="text-danger">Not Assigned</span></td>
                                  <td><span class="badge bg-warning">Pending</span></td>
                              </tr>
                              <tr>
                                <td>ECS 103</td>
                                <td>LAW1RB</td>
                                <td><span class="text-danger">Not Assigned</span></td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
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
