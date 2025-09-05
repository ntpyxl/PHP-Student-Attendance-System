<?php
require_once __DIR__ . "/../classes/student.php";
require_once __DIR__ . "/../classes/course.php";

function fileStudentAttendance($studentId, $date, $time)
{
    $student = new Student();
    $course = new Course();

    $studentCourseCode = $student->getStudentByStudentId($studentId)["course_code"];
    $courseTimeIn = $course->getCourseByCode($studentCourseCode)["course_time_in"];

    $data = [
        "student_id" => $studentId,
        "attendance_date" => $date,
        "time_in" => $time,
        "status" => $time <= $courseTimeIn ? "present" : "late"
    ];

    $fileStudentAttendanceResult = $student->fileAttendance($data);

    if ($fileStudentAttendanceResult) {
        return array(
            "status" => 200,
            "message" => "File attendance success."
        );
    } else {
        return array(
            "status" => 400,
            "message" => "File attendance failed."
        );
    }
}
