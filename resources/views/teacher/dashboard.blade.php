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

</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">

            {{-- SIDEBAR --}}
            @include('components.teacher_sidebar')

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
                                    <li><a class="dropdown-item" href="teacher-profile.html">View Profile</a></li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <li><button type="submit" class="dropdown-item">Logout</button></li>
                                    </form>
                                    {{-- <li><a class="dropdown-item" href="logout.html">Logout</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Page content -->
                <div class="container-fluid page-content mt-3">
                    <br><br>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-user-md"></i>
                                    <h5 class="card-title">Assigned Subjects</h5>
                                    <strong> <span class="card-number">{{$assigned_subject_count->count}}</span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-procedures"></i>
                                    <h5 class="card-title">Assigned Section</h5>
                                    <strong> <span class="card-number">{{$assigned_class_count}}</span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-calendar-check"></i>
                                    <h5 class="card-title">Grades to be Encoded</h5>
                                    <strong> <span class="card-number">{{$pending_grades->count}}</span></strong>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Pending Class Sections Table -->
                    <h5>Pending Class Grade</h5>
                    <div class="table-container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Section</th>
                                    <th>Subject Name</th>
                                    <th> Grade Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($classes as $class)

                                    <tr>
                                        <td>{{$class->section}}</td>
                                        <td>
                                            {{$class->subject_name}}
                                            <p class="subject-code" id="subjectCode"
                                                style="font-size: 0.8em; color: rgb(182, 26, 26);">{{$class->subject_code}} - {{$class->units}} units</p>
                                        </td>

                                        {{-- When there is no students with a score of 0, means everyone has been graded, thus being completed --}}
                                        @if ($class->ungraded_count <= 0)
                                        <td><span class="badge bg-success">Completed</span></td>
                                        @else
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        @endif
                                    </tr>

                                @endforeach

                                {{-- <tr>
                                    <td>ECS 103</td>
                                    <td>LAW1RB</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                  <td>ECS 103</td>
                                  <td>LAW1RB</td>
                                  <td><span class="badge bg-warning">Pending</span></td>
                              </tr>
                              <tr>
                                <td>ECS 103</td>
                                <td>LAW1RB</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr> --}}
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
