<!-- Edit Admin Modal -->
<div class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="editAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAdminModalLabel">Edit Admin Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <input type="text" class="form-control" name="admin_name" id="editAdminName" placeholder="Enter admin's name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="admin_email" id="editAdminEmail" placeholder="Enter admin's email" required>
                    </div>
                    {{-- <div class="mb-3">
                        <input type="text" class="form-control" id="editAdminRole" placeholder="Enter admin's role">
                    </div> --}}
                    <div class="mb-3">
                        <input type="password" class="form-control" name="admin_password" id="editAdminPassword" placeholder="Enter admin's password">
                        <div>
                            <input type="checkbox" id="show_password" class="form-check-input" onclick="showPassword('editAdminPassword')">
                            <label id="form-check-label" for="show_password">Show Password</label>
                        </div>
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
