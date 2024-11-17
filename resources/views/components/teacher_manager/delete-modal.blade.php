<!-- Delete Teacher Modal -->
<div class="modal fade" id="deleteTeacherModal" tabindex="-1" aria-labelledby="deleteTeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteTeacherModalLabel">Delete Teacher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this teacher's record?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                {{-- <button type="button" class="btn btn-danger" onclick="showErrorMessage('Error deleting teacher. Please try again.')">Delete</button> --}}
                <a class="btn btn-danger" id="deleteClassModalBtn">Delete</a>
            </div>
        </div>
    </div>
</div>
