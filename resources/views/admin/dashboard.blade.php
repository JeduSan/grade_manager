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
    <style>




    </style>
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

                <!-- Page content -->
                <div class="mt-3 container-fluid page-content">
                    <br><br>
                    <div class="row">
                        <div class="mb-3 col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-user-md"></i>
                                    <h5 class="card-title"> Total Teachers</h5>
                                    <strong> <span class="card-number">{{$teacher_count}}</span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-procedures"></i>
                                    <h5 class="card-title"> Total Students</h5>
                                   <strong> <span class="card-number">{{$student_count}}</span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-calendar-check"></i>
                                    <h5 class="card-title">Total Sections</h5>
                                    <strong> <span class="card-number">{{$class_count}}</span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-3">

                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-calendar-alt"></i>
                                    <h5 class="card-title">Current Semester</h5>
                                    <strong> <span class="card-number">
                                        @if ($current_sem->sem == 1)
                                            1st Semester
                                        @elseif ($current_sem->sem == 2)
                                            2nd Semester
                                        @elseif ($current_sem->sem == 3)
                                            Summer
                                        @endif
                                        {{$current_sem->start."-".$current_sem->end}}
                                    </span></strong>
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

                                @foreach ($pending_classes as $class)

                                    <tr>
                                        <td>{{$class->code}}</td>
                                        <td>
                                            @if ($class->section != null)
                                                {{$class->section}}
                                            @else
                                                <span class="badge bg-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td><span class="text-danger">Not Assigned</span></td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                    </tr>

                                @endforeach

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
