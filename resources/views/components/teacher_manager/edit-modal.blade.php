<!-- Edit Teacher Modal -->
<div class="modal fade" id="editTeacherModal" tabindex="-1" aria-labelledby="editTeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTeacherModalLabel">Edit Teacher Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <input type="text" class="form-control" name="teacher_id" id="teacher-id" placeholder="Enter teacher's ID" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="teacher_fname" id="teacherFirstName" placeholder="Enter teacher's first name" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="teacher_lname" id="teacherLastName" placeholder="Enter teacher's last name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="teacher_email" id="teacher-email" placeholder="Enter teacher's email" required>
                    </div>
                    <div class="mb-3">
                        {{-- <input type="text" class="form-control" name="teacher_dept" id="teacherDepartment" placeholder="Enter teacher's department"> --}}
                        <select name="teacher_dept" id="teacher-dept" class="form-control" required>
                            <option value="" selected disabled>Select department</option>
                            @foreach ($depts as $dept)
                                <option value="{{$dept->id}}">[{{$dept->abbr}}] {{$dept->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="teacher_password" id="editTeacherPassword" placeholder="Create Password">
                        <div>
                            <input type="checkbox" id="show_password" class="form-check-input" onclick="showPassword('editTeacherPassword')">
                            <label id="form-check-label" for="show_password">Show Password</label>
                        </div>
                    </div>

                    {{-- ERROR MESSAGES --}}
                    <div class="mb-3">
                        <x-input-error :messages="$errors->get('teacher_id')" class="mt-2" />
                        <x-input-error :messages="$errors->get('teacher_fname')" class="mt-2" />
                        <x-input-error :messages="$errors->get('teacher_lname')" class="mt-2" />
                        <x-input-error :messages="$errors->get('teacher_email')" class="mt-2" />
                        <x-input-error :messages="$errors->get('teacher_dept')" class="mt-2" />
                        <x-input-error :messages="$errors->get('teacher_password')" class="mt-2" />
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
