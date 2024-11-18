<!-- Modal for adding student -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/manager/add/student" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="student_id" id="studentID" placeholder="Enter student ID" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="student_fname" id="studentFName" placeholder="Enter student's first name" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="student_mname" id="studentMName" placeholder="Enter student's middle name" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="student_lname" id="studentLName" placeholder="Enter student's last name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="student_email" id="studentEmail" placeholder="Enter student's email" required>
                    </div>
                    <div class="mb-3">
                        {{-- <input type="text" class="form-control" name="student_course" id="studentCourse" placeholder="Enter student's course"> --}}
                        <select name="student_course" id="studentCourse" class="form-control" required>
                            <option value="" selected disabled>Select Course</option>
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        {{-- <input type="text" class="form-control" name="student_year" id="studentYear" placeholder="Enter student's year"> --}}
                        <select name="student_year" id="studentYear" class="form-control" required>
                            <option value="" selected disabled>Select Year</option>
                            <option value="0">Irregular</option>
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                            <option value="3">3rd Year</option>
                            <option value="4">4th Year</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="student_password" id="studentPassword" placeholder="Enter student's password" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-add">Save Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
