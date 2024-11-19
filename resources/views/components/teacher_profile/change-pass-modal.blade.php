<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="changePassForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <input type="password" class="form-control" name="old_password" id="currentPassword" placeholder="Current Password">
                        <x-input-error :messages="$errors->get('old_password')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="new_password" id="newPassword" placeholder="New Password">
                        <x-input-error :messages="$errors->get('new_password')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="new_password_confirmation" id="confirmPassword" placeholder="Confirm New Password">
                        <x-input-error :messages="$errors->get('new_password_confirmation')" class="mt-2" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-add">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
