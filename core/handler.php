<?php
session_start();

foreach (glob(__DIR__ . "/functions/*.php") as $filename) {
    require_once $filename;
}

$functionResult = array(
    "status" => 400,
    "message" => "Unknown post request."
);

if (isset($_POST['registerUserRequest'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_role = $_POST['user_role'];
    $year_level = $_POST['year_level'];
    $course_code = $_POST['course_code'];

    $functionResult = registerUser($username, $password, $first_name, $last_name, $user_role, $year_level, $course_code);
}

if (isset($_POST['loginUserRequest'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $functionResult = loginUser($username, $password);
}

if (isset($_POST['logoutUserRequest'])) {
    $functionResult = logoutUser();
}

if (isset($_POST['addCourseRequest'])) {
    $courseName = $_POST['courseName'];
    $courseCode = $_POST['courseCode'];
    $courseTimeIn = $_POST['courseTimeIn'];

    $functionResult = addCourse($courseName, $courseCode, $courseTimeIn);
}

if (isset($_POST['editCourseRequest'])) {
    $courseId = $_POST['courseId'];
    $courseName = $_POST['courseName'];
    $courseCode = $_POST['courseCode'];
    $courseTimeIn = $_POST['courseTimeIn'];

    $functionResult = editCourse($courseId, $courseName, $courseCode, $courseTimeIn);
}

if (isset($_POST['fileAttendanceRequest'])) {
    $studentId = $_SESSION['user_role_id'];
    $data = $_POST['date'];
    $time = $_POST['time'];

    $functionResult = fileStudentAttendance($studentId, $data, $time);
}

if (isset($_POST['submitExcuseRequest'])) {
    $studentId = $_SESSION['user_role_id'];
    $data = $_POST['date'];
    $content = $_POST['content'];

    $functionResult = submitExcuseLetter($studentId, $data, $content);
}

if (isset($_POST['changeExcuseStatusRequest'])) {
    $excuseId = $_POST['excuseId'];
    $studentId = $_POST['studentId'];
    $excuseStatus = $_POST['excuseStatus'];

    $functionResult = changeExcuseStatus($excuseId, $studentId, $excuseStatus);
}

if ($functionResult['status'] === 200) {
    http_response_code(200);
    echo json_encode(['message' => $functionResult['message']]);
} else {
    http_response_code(400);
    echo json_encode(['message' => $functionResult['message']]);
}
exit;
