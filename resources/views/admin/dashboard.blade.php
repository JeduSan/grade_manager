<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>Admin Manager</h1>

    <main>
        <!-- Add Teacher -->
        <div>
            <h3>Add Teacher</h3>
            <form action="/admin/dashboard/add/teacher" method="POST">
                @csrf
                <div>
                    <label for="teacher_id">Teacher ID</label>
                    <input type="text" name="teacher_id" id="teacher_id" placeholder="XMPL1234" required>
                </div>
                <div>
                    <label for="teacher_fname">Teacher First Name</label>
                    <input type="text" name="teacher_fname" id="teacher_fname" placeholder="Juan" required>
                </div>
                <div>
                    <label for="teacher_lname">Teacher Last Name</label>
                    <input type="text" name="teacher_lname" id="teacher_lname" placeholder="Dela Cruz" required>
                </div>
                <div>
                    <input type="submit" value="Add Teacher">
                </div>
            </form>
        </div>

        <!-- Add Student -->
        <div>
            <h3>Add Student</h3>
            <form action="" method="POST">
                @csrf
                <div>
                    <label for="student_id">Student ID</label>
                    <input type="text" name="student_id" id="student_id" placeholder="A24-1234" required>
                </div>
                <div>
                    <label for="student_fname">Student First Name</label>
                    <input type="text" name="student_fname" id="student_fname" placeholder="Juan" required>
                </div>
                <div>
                    <label for="student_mname">Student Middle Name</label>
                    <input type="text" name="student_mname" id="student_mname" placeholder="Doe" required>
                </div>
                <div>
                    <label for="student_lname">Student Last Name</label>
                    <input type="text" name="student_lname" id="student_lname" placeholder="Dela Cruz" required>
                </div>
                <div>
                    <label for="student_email">Student Email</label>
                    <input type="email" name="student_email" id="student_email" placeholder="juan@example.com"
                        required>
                </div>
                <div>
                    <label for="student_course">Student Course</label>
                    <!-- [ ] Fill this with courses from the database-->
                    <select name="student_course" id="student_course">
                        <option value="" selected disabled>Select Course</option>
                    </select>
                </div>
                <div>
                    <label for="student_year">Student Year</label>
                    <select name="student_year" id="student_year">
                        <option value="" selected disabled>Select Year</option>
                        <option value="0">Irregular</option>
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>
                    </select>
                </div>
                <div>
                    <input type="submit" value="Add Student">
                </div>
            </form>
        </div>

        <!-- Add Subject -->
        <div>
            <h3>Add Subject</h3>
            <form action="" method="POST">
                @csrf
                <div>
                    <label for="subject_name">Subject Name</label>
                    <input type="text" name="subject_name" id="subject_name" placeholder="Software Engineering 1"
                        required>
                </div>
                <div>
                    <label for="subject_code">Subject Code</label>
                    <input type="text" name="subject_code" id="subject_code" placeholder="CCS123" required>
                </div>
                <div>
                    <label for="subject_units">Subject Units</label>
                    <input type="text" name="subject_units" id="subject_units" placeholder="5" required>
                </div>
                <div>
                    <input type="submit" value="Add Subject">
                </div>
            </form>
        </div>

        <!-- Add Semester -->
        <div>
            <h3>Add Semester</h3>
            <form action="" method="post">
                @csrf
                <div>
                    <label for="semester">Semester</label>
                    <select name="semester" id="semester" required>
                        <option value="" selected disabled>Select Semester</option>
                        <option value="1">First Semester</option>
                        <option value="2">Second Semester</option>
                        <option value="3">Summer</option>
                    </select>
                </div>
                <div>
                    <label for="semester_start">Semester Start Date</label>
                    <input type="date" name="semester_start" id="semester_start" required>
                </div>
                <div>
                    <label for="semester_end">Semester End Date</label>
                    <input type="date" name="semester_end" id="semester_end" required>
                </div>
                <div>
                    <input type="submit" value="Add Semester">
                </div>
            </form>
        </div>
    </main>
</body>

</html>
