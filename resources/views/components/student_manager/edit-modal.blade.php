<!-- Edit Student Modal -->
<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStudentModalLabel">Edit Student Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <input type="text" class="form-control" name="student_id" id="editStudentID" placeholder="Enter student ID" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="student_fname" id="editStudentFName" placeholder="Enter student's first name" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="student_mname" id="editStudentMName" placeholder="Enter student's middle name" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="student_lname" id="editStudentLName" placeholder="Enter student's last name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="student_email" id="editStudentEmail" placeholder="Enter student's email" required>
                    </div>
                    <div class="mb-3">
                        {{-- <input type="text" class="form-control" name="student_course" id="editStudentCourse" placeholder="Enter student's course"> --}}
                        <select name="student_course" id="editStudentCourse" class="form-control" required>
                            <option value="" selected disabled>Select Course</option>
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        {{-- <input type="text" class="form-control" name="student_year" id="editStudentYear" placeholder="Enter student's year"> --}}
                        <select name="student_year" id="editStudentYear" class="form-control" required>
                            <option value="" selected disabled>Select Year</option>
                            <option value="0">Irregular</option>
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                            <option value="3">3rd Year</option>
                            <option value="4">4th Year</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="student_password" id="studentPassword" placeholder="Enter student's password">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-add">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
