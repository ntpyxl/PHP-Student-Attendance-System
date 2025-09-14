<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
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
    <div class="flex py-2 justify-center items-center shadow-[0px_4px_4px_rgba(0,0,0,0.4)]">
        <h1 class="text-3xl font-bold">Student Attendance System</h1>
    </div>

    <div class="flex flex-row p-3 gap-3">
        <div class="space-y-3">
            <div class="flex flex-col w-[340px] p-2 border-2 border-black">
                <?php include __DIR__ . "/components/userProfile.php"; ?>
            </div>

            <div class="flex flex-col w-[340px] p-2 border-2 border-black">
                <?php include __DIR__ . "/components/otherActionsButtons.php"; ?>
            </div>
        </div>

        <div id="mainContent" class="flex flex-col flex-1 p-2 border-2 border-black">
            <?php
            if ($_SESSION['user_role'] === "student") {
                include __DIR__ . "/components/studentAttendanceHistory.php";
            } elseif ($_SESSION['user_role'] === "admin") { ?>
                <div id="attendanceHistoryTab" class="block">
                    <?php include __DIR__ . "/components/allStudentAttendanceHistory.php"; ?>
                </div>
                <div id="manageCoursesTab" class="hidden">
                    <?php include __DIR__ . "/components/manageCourses.php"; ?>
                </div>
                <div id="manageExcusesTab" class="hidden">
                    <?php include __DIR__ . "/components/manageExcuses.php"; ?>
                </div>
            <?php
            }
            ?>
        </div>

        <!-- MODALS -->
        <?php include __DIR__ . "/components/fileAttendanceModal.php"; ?>
        <?php include __DIR__ . "/components/submitExcuseModal.php"; ?>
    </div>


    <script src="core/scripts/directories.js"></script>
    <script src="core/scripts/generalScripts.js"></script>
    <script src="core/scripts/accountScripts.js"></script>
    <script src="core/scripts/adminScripts.js"></script>
    <script src="core/scripts/studentScripts.js"></script>
</body>

</html>