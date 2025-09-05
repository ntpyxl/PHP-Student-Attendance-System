<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="styles.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <title>Student Attendance System</title>
</head>

<body>
    <h3 class="flex py-3 justify-center items-center text-3xl font-bold">Student Attendance System</h3>
    <div class="flex flex-col p-2 justify-center items-center">
        <div class="flex flex-col px-12 py-2 border-2 border-black justify-center items-center">
            <h5 class="py-1 text-xl font-semibold">Register Page</h5>

            <form id="registerUserForm" class="flex flex-col py-2 space-y-3">
                <div class="flex flex-col">
                    <label for="usernameField" class="ml-1">Username</label>
                    <input
                        id="usernameField"
                        type="text"
                        class="border-2 px-2 border-black rounded-2xl"
                        required></input>
                </div>

                <div class="flex flex-col">
                    <label for="passwordField" class="ml-1">Password</label>
                    <input
                        id="passwordField"
                        type="password"
                        class="border-2 px-2 border-black rounded-2xl"
                        required></input>
                </div>

                <div class="flex flex-col">
                    <label for="firstnameField" class="ml-1">First Name</label>
                    <input
                        id="firstnameField"
                        type="text"
                        class="border-2 px-2 border-black rounded-2xl"
                        required></input>
                </div>

                <div class="flex flex-col">
                    <label for="lastnameField" class="ml-1">Last Name</label>
                    <input
                        id="lastnameField"
                        type="text"
                        class="border-2 px-2 border-black rounded-2xl"
                        required></input>
                </div>

                <div class="flex flex-col">
                    <label for="userRoleField" class="ml-1">Role</label>
                    <select
                        id="userRoleField"
                        type="text"
                        class="border-2 px-2 py-1 border-black rounded-2xl"
                        required>
                        <option value="" disabled selected>Select a User Role</option>
                        <option value="student">Student</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div id="additionalStudentFields" class="space-y-3">
                    <div class="flex flex-col">
                        <label for="studentYearLevelField" class="ml-1">Year Level</label>
                        <select
                            id="studentYearLevelField"
                            type="text"
                            class="border-2 px-2 py-1 border-black rounded-2xl"
                            required>
                            <option value="" disabled selected>Select a Year Level</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="studentCourseField" class="ml-1">Course</label>
                        <select
                            id="studentCourseField"
                            type="text"
                            class="border-2 px-2 py-1 border-black rounded-2xl"
                            required>

                            <option value="" disabled selected>Select a Course</option>

                            <?php
                            require_once __DIR__ . "/core/classes/course.php";

                            $course = new Course();
                            $courseList = $course->getAllCourses();

                            foreach ($courseList as $courseRow) {
                                $courseCode = $courseRow['course_code'];
                                $courseName = $courseRow['course_name'];
                            ?>
                                <option value='<?php echo $courseCode; ?>'>
                                    <?php echo $courseName; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <button
                    class="border-2 my-2 py-1 border-black rounded-2xl bg-green-200 hover:scale-105 duration-150 cursor-pointer">
                    Register
                </button>
            </form>
        </div>
        <p>
            Already registered?
            <a
                href="login.php"
                class="text-blue-700 hover:underline">Log in your account!
            </a>
        </p>
    </div>

    <script src="core/scripts/directories.js"></script>
    <script src="core/scripts/accountScripts.js"></script>
</body>

</html>