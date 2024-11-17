CREATE TRIGGER after_class_insert
AFTER INSERT ON class
FOR EACH ROW
BEGIN

DECLARE student_year_level_id_ INT;

DECLARE done BOOL DEFAULT false; # will act as loop guard

# cursor for iterating on the select result
DECLARE cur CURSOR FOR
# fetch students with the same course and year as the newly inserted class
SELECT
student_year_level.id
FROM student
LEFT JOIN student_year_level
ON student_year_level.student_key = student.`key`
WHERE student.course_id = NEW.course_id
AND student_year_level.year_level_id = NEW.year_level_id;

# declare NOT FOUND handler
DECLARE CONTINUE HANDLER
FOR NOT FOUND SET done = true;

# open cursor
OPEN cur;

insert_students: LOOP

  # temporarily store each data to a variable
  FETCH cur INTO student_year_level_id_;

  # insert the fetched student into the student_class, therefore registering them to the newly inserted class
  INSERT INTO student_class (student_class.student_year_level_id,student_class.class_id,student_class.score)
  VALUES (student_year_level_id_,NEW.id,0);

	IF done = true THEN
		LEAVE insert_students;
	END IF;

END LOOP insert_students;

# close cursor
CLOSE cur;

END
