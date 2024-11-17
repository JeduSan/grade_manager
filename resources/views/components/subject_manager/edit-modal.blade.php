<!-- Edit Subject Modal -->
<div class="modal fade" id="editSubjectModal" tabindex="-1" aria-labelledby="editSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubjectModalLabel">Edit Subject Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <input type="text" class="form-control" name="subject_code" id="editSubjectCode" placeholder="Enter Subject Code">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="subject_name" id="editSubjectName" placeholder="Enter Subject Name">
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" name="subject_units" id="editSubjectUnits" placeholder="Enter Subject Units">
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
