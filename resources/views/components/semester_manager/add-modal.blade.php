<!-- Modal for adding admin -->
<div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAdminModalLabel">Add New Sem</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/settings/add/sem" method="POST">
                    @csrf

                    <div class="mb-3">
                        <select class="form-control" name="semester" id="semestet">
                            <option value="" selected disabled>Select Semester</option>
                            <option value="1">1st Semester</option>
                            <option value="2">2nd Semester</option>
                            <option value="3">Summer</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-control-label " for="semester_start">Start Date</label>
                        <input class="form-control" type="date" id="semester_start" name="semester_start">
                    </div>

                    <div class="mb-3">
                        <label class="form-control-label" for="semester_end">End Date</label>
                        <input class="form-control" type="date" id="semester_end" name="semester_end">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-add">Add Semester</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
