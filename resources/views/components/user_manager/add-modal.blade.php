<!-- Modal for adding admin -->
<div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAdminModalLabel">Add New Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/manager/add/user" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="admin_name" id="adminName" placeholder="Enter admin's username" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="admin_fname" id="adminFName" placeholder="Enter admin's firtname" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="admin_lname" id="adminLName" placeholder="Enter admin's lastname" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="admin_email" id="adminEmail" placeholder="Enter admin's email" required>
                    </div>
                    {{-- <div class="mb-3">
                        <input type="text" class="form-control" id="adminRole" placeholder="Enter admin's role">
                    </div> --}}
                    <div class="mb-3">
                        <input type="password" class="form-control" name="admin_password" id="adminPassword" placeholder="Enter admin's password" required>
                        <div>
                            <input type="checkbox" id="show_password" class="form-check-input" onclick="showPassword('adminPassword')">
                            <label id="form-check-label" for="show_password">Show Password</label>
                        </div>
                    </div>

                    {{-- ERROR MESSAGES --}}
                    <div class="mb-3">
                        <x-input-error :messages="$errors->get('admin_name')" class="mt-2" />
                        <x-input-error :messages="$errors->get('admin_email')" class="mt-2" />
                        <x-input-error :messages="$errors->get('admin_password')" class="mt-2" />
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-add">Save Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
