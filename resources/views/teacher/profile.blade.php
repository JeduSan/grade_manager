<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Account - Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <link rel="stylesheet" href="{{asset('assets/css/sidebar-template.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/page-content.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">

    <style>

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">

            {{-- SIDEBAR --}}
            @include('components.teacher_sidebar')

            <!-- Main content -->
            <div class="col p-0">

                {{-- APPBAR --}}
                @include('components.teacher_appbar')

                {{-- POPUP --}}
                @include('components.popup-condition')

                <!-- Page content -->
                <div class="container-fluid page-content mt-3">
                    <div class="profile-container">

                        <div class="profile-header">
                            <div>
                                <div class="col-md-6" style="font-size: 1em; color: #d6251b;"><strong>{{$user->id}}</strong></div>
                                <h2>{{$user->fname." ".$user->lname}}</h2>
                                <div class="col-md-6" style="font-size: 0.9em; color: #d6251b;">{{$user->email}}</div>
                                <p>Admin - EUC Grading System</p>
                            </div>
                        </div>

                        <div class="action-btns">
                            <button class="btn btn-add" data-bs-toggle="modal" data-form="{{$user->user_id}}" data-fname="{{$user->fname}}" data-lname="{{$user->lname}}" data-email="{{$user->email}}" data-bs-target="#editProfileModal">Edit Profile</button>
                            <button class="btn btn-password" data-bs-toggle="modal" data-form="{{$user->user_id}}" data-bs-target="#changePasswordModal">Change Password</button>
                            <button class="btn btn-cancel" data-bs-toggle="modal" data-form="{{$user->user_id}}" data-bs-target="#deactivateAccountModal">Deactivate Account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- EDIT MODAL --}}
    @include('components.teacher_profile.edit-modal')

    {{-- CHANGE PASSWORD MODAL --}}
    @include('components.teacher_profile.change-pass-modal')

    {{-- DEACTIVATE ACCOUNT MODAL --}}
    @include('components.teacher_profile.delete-modal')

    <script>
        var editButtons = document.querySelectorAll('[data-bs-target="#editProfileModal"]');
        var editForm = document.querySelector('#editForm');
        var changeButtons = document.querySelectorAll('[data-bs-target="#changePasswordModal"]');
        var changePassForm = document.querySelector('#changePassForm');
        var deleteButtons = document.querySelectorAll('[data-bs-target="#deactivateAccountModal"]');
        var deleteForm = document.querySelector('#deleteForm');

        deleteButtons.forEach(function (button){
            button.addEventListener('click',function(){
                var form = button.getAttribute('data-form');

                // alert(`${fname} - ${lname} - ${email} - ${form}`);
                deleteForm.setAttribute('action','/teacher/profile/deactivate/' + form);
            });
        });

        changeButtons.forEach(function (button){
            button.addEventListener('click',function(){
                var form = button.getAttribute('data-form');

                // alert(`${fname} - ${lname} - ${email} - ${form}`);
                changePassForm.setAttribute('action','/teacher/profile/update/password/' + form);
            });
        });

        editButtons.forEach(function (button){
            button.addEventListener('click',function(){
                var fname = button.getAttribute('data-fname');
                var lname = button.getAttribute('data-lname');
                var email = button.getAttribute('data-email');
                var form = button.getAttribute('data-form');

                // alert(`${fname} - ${lname} - ${email} - ${form}`);
                editForm.setAttribute('action','/teacher/profile/update/' + form);
                document.getElementById('editFName').value = fname;
                document.getElementById('editLName').value = lname;
                document.getElementById('editEmail').value = email;
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
