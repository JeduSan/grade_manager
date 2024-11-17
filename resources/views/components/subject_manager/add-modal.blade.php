<!-- Modal for adding subject -->
<div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubjectModalLabel">Add New Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/manager/add/subject" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="subject_code" id="subjectCode" placeholder="Enter Subject Code" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="subject_name" id="subjectName" placeholder="Enter Subject Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" name="subject_units" id="subjectUnits" placeholder="Enter Subject Units" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-add">Save Subject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
