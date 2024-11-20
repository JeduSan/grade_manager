<!-- Delete Student Confirmation Modal -->
<div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteStudentModalLabel">Delete Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this student's record?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteClassModalBtn" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
                {{-- <a class="btn btn-danger" id="deleteClassModalBtn">Delete</a> --}}
            </div>
        </div>
    </div>
</div>
