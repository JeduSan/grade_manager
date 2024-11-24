<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <input type="text" class="form-control" name="teacher_fname" id="editFName" placeholder="First Name">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="teacher_lname" id="editLName" placeholder="Last Name">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="teacher_email" id="editEmail" placeholder="Email Address">
                    </div>

                    {{-- ERROR MESSAGES --}}
                    <div class="mb-3">
                        <x-input-error :messages="$errors->get('teacher_fname')" class="mt-2" />
                        <x-input-error :messages="$errors->get('teacher_lname')" class="mt-2" />
                        <x-input-error :messages="$errors->get('teacher_email')" class="mt-2" />
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
