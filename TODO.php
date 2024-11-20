<?php

// =======
// ADMIN DASHBOARD
// =======
// [x] Add teacher
// [x] Add student
// [x] Add subject
// [x] Add semester
// [x] Assign a class/section to a teacher
// [ ] Subject Manager -> see all students for that subject and who is the instructor

// [x] Register student to a class upon class creation based on course and year

// ======
// ADMIN MANAGER
// ======
// [ ] Teachers
    // [x] UI
    // [x] edit
    // [x] delete
    // [ ] view

// [ ] Students
    // [x] UI
    // [x] edit
    // [x] delete
    // [ ] view

// NOTE: Skipped for now. Fix logic first, too destructive
// [x] Sems
    // [x] UI
    // [ ] edit
    // [x] delete

// [x] Subjects
    // [x] UI
    // [x] edit
    // [x] delete

// [x] Merge teacher add & manager in one page
// [x] Merge student add & manager in one page
// [x] Merge subject add & manager in one page
// [x] Merge sem add & manager in one page

// [x] Excel upload of students
// [x] " teachers
// [x] "" subjects

// [x] APPLY UI
// [x] Teacher manager
// [x] Student manager
// [x] Class manager
// [x] Subject manager
// [x] User manager
// [x] Dashboard

// ==================
// TEACHER DASHBOARD
// ==================
// [x] List of assigned subjects/classes
// [x] List of students per subject/class
// [x] Input of grades
// [ ] dashboard

// BUG: [KNOWN BUGS]
    // [ ] Searching for a class with enough data for a second page will cause the second page to be inaccessible
        // ex: searching for "wish" will have 2 page result, but the second page will be inaccessible.

// [ ] Apply error messages to forms to see what is wrong from the outputs
    // [ ] set old value
    // [ ] make updates unique (id and email)

    // [ ] Admin
    // [ ] add teacher
    // [ ] edit teacher
    // [ ] add student
    // [ ] edit student
    // [ ] add class
    // [ ] edit class
    // [ ] add subject
    // [ ] edit subject

// [x] Login UI

// [x] Add show password to:
    // [x] Login
    // [x] Teacher add
    // [x] Teacher edit
    // [x] Student add
    // [x] Student edit

// BUG //[x] Adding a student to a class creates a new instance of the class on the class list (teacher side -> view subjects)
    // Steps to reproduce: add a student to a class (admin), then view subjects (teacher)

// [x] remember me when logging in

// [x] Change delete confirmations from link to form & route from GET to DELETE(refer to teacher profile account deactivation)
    // [x] class
    // [x] teacher
    // [x] student
    // [x] subjects
    // [x] users

// [ ] Add a semester page

// [ ] Make students unique per class (currently you can add multiple of the same student)

// [ ] Fix unique on update error
    // [ ] student ([x]email,id)
    // [ ] teacher (email,id)
    // [ ] subject (code)
    // [ ] class (section)
    // [ ] user (email)

// [ ] UPDATE MIGRATION since I updated student_class.score to be nullable, and the class trigger
