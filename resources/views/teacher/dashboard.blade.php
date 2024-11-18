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
                            <a href="view-subjects.html" class="nav-link px-0 align-middle text-white">
                                <i class="fas fa-user icon-size"></i> <span class="ms-1">View Subjects</span>
                            </a>
                        </li>


                </div>
            </div>

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
                                    <h5 class="card-title"> Assigned Subjects</h5>
                                    <strong> <span class="card-number">122</span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-procedures"></i>
                                    <h5 class="card-title"> Assigned Class</h5>
                                    <strong> <span class="card-number">123</span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fas fa-calendar-check"></i>
                                    <h5 class="card-title">Grades to be Encoded</h5>
                                    <strong> <span class="card-number">22</span></strong>
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
                                    <th>Subject Name</th>
                                    <th>Section</th>
                                    <th> Grade Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
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
