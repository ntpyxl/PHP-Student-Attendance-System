<?php
require_once __DIR__ . "/../classes/admin.php";
require_once __DIR__ . "/../classes/course.php";

function addCourse($courseName, $courseCode, $courseTimeIn)
{
    $course = new Course();

    $data = [
        "course_name" => $courseName,
        "course_code" => $courseCode,
        "course_time_in" => $courseTimeIn
    ];

    $addCourseResult = $course->addCourse($data);

    if ($addCourseResult) {
        return array(
            "status" => 200,
            "message" => "Add course success."
        );
    } else {
        return array(
            "status" => 400,
            "message" => "Add course failed."
        );
    }
}

function editCourse($courseId, $courseName, $courseCode, $courseTimeIn)
{
    $course = new Course();

    $data = [
        "course_name" => $courseName,
        "course_code" => $courseCode,
        "course_time_in" => $courseTimeIn
    ];

    $addCourseResult = $course->editCourse($data, $courseId);

    if ($addCourseResult) {
        return array(
            "status" => 200,
            "message" => "Edit course success."
        );
    } else {
        return array(
            "status" => 400,
            "message" => "Edit course failed."
        );
    }
}

function refreshAttendanceAdminList($yearLevel, $courseCode)
{
    $admin = new Admin();

    $yearLevel = $yearLevel != 0 ? $yearLevel : null;
    $courseCode = $courseCode !== "None" ? $courseCode : null;

    return $admin->viewAttendanceByCourse($yearLevel, $courseCode);
}

function refreshExcuseLettersAdminList($yearLevel, $courseCode)
{
    $admin = new Admin();

    $yearLevel = $yearLevel != 0 ? $yearLevel : null;
    $courseCode = $courseCode !== "None" ? $courseCode : null;

    return $admin->viewExcusesByCourse($yearLevel, $courseCode);
}
