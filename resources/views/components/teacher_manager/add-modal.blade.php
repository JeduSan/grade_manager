<!-- Add Teacher Modal -->
<div class="modal fade" id="addTeacherModal" tabindex="-1" aria-labelledby="addTeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTeacherModalLabel">Add New Teacher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/manager/add/teacher" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="teacher_id" id="teacherId" placeholder="Enter teacher's ID" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="teacher_fname" id="teacherFName" placeholder="Enter teacher's first name" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="teacher_lname" id="teacherlName" placeholder="Enter teacher's last name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="teacher_email" id="teacherEmail" placeholder="Enter teacher's email" required>
                    </div>
                    <div class="mb-3">
                        {{-- <input type="text" class="form-control" name="teacher_dept" id="teacherDepartment" placeholder="Enter teacher's department"> --}}
                        <select name="teacher_dept" id="teacherDept" class="form-control" required>
                            <option value="" selected disabled>Select department</option>
                            @foreach ($depts as $dept)
                                <option value="{{$dept->id}}">[{{$dept->abbr}}] {{$dept->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="teacher_password" id="teacherPassword" placeholder="Create Password" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-add">Save Teacher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
