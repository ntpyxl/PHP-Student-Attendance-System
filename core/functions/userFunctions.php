<?php
require_once __DIR__ . "/../classes/user.php";
require_once __DIR__ . "/../classes/student.php";
require_once __DIR__ . "/../classes/admin.php";

$user = new User();

function registerUser($username, $password, $first_name, $last_name, $user_role, $year_level, $course_code)
{
    $user = new User();

    $isUsernameTaken = $user->getUserByUsername($username);
    if ($isUsernameTaken) {
        return array(
            "status" => 400,
            "message" => "Register failed. Username is already taken."
        );
    }

    $userData = [
        'username' => $username,
        'password_hash' => password_hash($password, PASSWORD_DEFAULT),
        'role' => $user_role
    ];

    $userRegisterResult = $user->addUser($userData);
    $userSubtypeRegisterResult = false;

    $userInfoData = [
        'user_id' => $user->getUserByUsername($username)["user_id"],
        'first_name' => $first_name,
        'last_name' => $last_name
    ];

    switch ($user_role) {
        case "student":
            $student = new Student();

            global $userSubtypeRegisterResult;
            $userInfoData['year_level'] = $year_level;
            $userInfoData['course_code'] = $course_code;

            $userSubtypeRegisterResult = $student->addStudent($userInfoData);
            break;

        case "admin":
            $admin = new Admin();

            global $userSubtypeRegisterResult;
            $userSubtypeRegisterResult = $admin->addAdmin($userInfoData);
            break;
    }

    if ($userRegisterResult && $userSubtypeRegisterResult) {
        return array(
            "status" => 200,
            "message" => "Register success."
        );
    } else {
        return array(
            "status" => 400,
            "message" => "Register failed."
        );
    }
}

function loginUser($username, $password)
{
    $user = new User();
    $userInfo = $user->getUserByUsername($username);
    $personalUserInfo = null;

    if (!$userInfo) {
        return array(
            "status" => 400,
            "message" => "Login failed. Username does not exist."
        );
    }

    switch ($userInfo["role"]) {
        case "student":
            $student = new Student();
            $personalUserInfo = $student->getStudentByUserId($userInfo["user_id"]);
            break;

        case "admin":
            $admin = new Admin();
            $personalUserInfo = $admin->getAdminByUserId($userInfo["user_id"]);
            break;
    }

    if ($userInfo && password_verify($password, $userInfo["password_hash"])) {
        $_SESSION['user_id'] = $userInfo["user_id"];
        $_SESSION['user_role_id'] = $userInfo["role"] == "admin" ? $personalUserInfo["admin_id"] : $personalUserInfo["student_id"];
        $_SESSION['user_firstname'] = $personalUserInfo["first_name"];
        $_SESSION['user_lastname'] = $personalUserInfo["last_name"];
        $_SESSION['user_role'] = $userInfo["role"];

        return array(
            "status" => 200,
            "message" => "Login success."
        );
    } else {
        return array(
            "status" => 400,
            "message" => "Login failed. Incorrect username or password."
        );
    }
}

function logoutUser()
{
    session_start();

    session_unset();
    session_destroy();

    return array(
        "status" => 200,
        "message" => "Logout success."
    );
}
