<!-- Modal for adding class -->
<div class="modal fade" id="addClassModal" tabindex="-1" aria-labelledby="addClassModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClassModalLabel">Add New Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/manager/add/class" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="instructor" class="form-label">Instructor</label>
                        <select class="form-select" name="instructor" id="instructor">
                            <option selected disabled>Select Instructor</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{$teacher->key}}">{{"$teacher->fname $teacher->lname [$teacher->id]" }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Class Subject</label>
                        <select class="form-select" name="subject" id="subject">
                            <option selected disabled>Select Subject</option>
                            @foreach ($subjects as $subject)
                                <option value="{{$subject->key}}">{{"$subject->description [$subject->code]"}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="course" class="form-label">Class Course</label>
                        <select class="form-select" name="course" id="course">
                            <option selected>Select Course</option>
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{"[$course->abbr] $course->description"}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Class Year</label>
                        <select class="form-select" name="year" id="year">
                            <option selected disabled>Select Year</option>
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                            <option value="3">3rd Year</option>
                            <option value="4">4th Year</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="semester" class="form-label">Semester</label>
                        <select class="form-select" name="semester" id="semester">
                            <option selected disabled>Select Semester</option>
                            @foreach ($semesters as $sem)
                            <option value="{{$sem->id}}">
                            @if ($sem->number == 1)
                                {{"1st Semester AY $sem->start_year-$sem->end_year"}}
                            @elseif ($sem->number == 2)
                                {{"2nd Semester AY $sem->start_year-$sem->end_year"}}
                            @elseif ($sem->number == 3)
                                {{"Summer AY $sem->start_year-$sem->end_year"}}
                            @endif
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="section" class="form-label">Section</label>
                        <input type="text" class="form-control" name="section" id="section" placeholder="Enter Section">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-add">Save Class</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
