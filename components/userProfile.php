<div>
    <h1 class="text-xl font-semibold text-center">User Profile</h1>

    <hr class="py-1">

    <div class="flex flex-row justify-around items-center">
        <p><b>USER ID:</b> <?php echo $_SESSION['user_id']; ?></p>
        <p>
            <?php if ($_SESSION['user_role'] === "student") { ?>
                <b>STUDENT ID:</b>
            <?php } elseif ($_SESSION['user_role'] === "admin") { ?>
                <b>ADMIN ID:</b>
            <?php } ?>

            <?php echo $_SESSION['user_role_id']; ?>
        </p>
    </div>

    <p class="text-2xl font-semibold text-center">
        <?php
        echo $_SESSION['user_firstname'] .
            " " .
            $_SESSION['user_lastname'];
        ?>
    </p>
</div>

<?php
if ($_SESSION['user_role'] === "student") {
?>
    <div class="mt-5">
        <h1 class="text-xl font-semibold text-center">Course</h1>
        <hr class="py-1">

        <?php
        require_once __DIR__ . "/../core/classes/student.php";
        require_once __DIR__ . "/../core/classes/course.php";

        $student = new Student();
        $course = new Course();

        $studentInfo = $student->getStudentByUserId($_SESSION['user_id']);
        $courseCode = $studentInfo["course_code"];
        $courseName = $course->getCourseByCode($courseCode)['course_name'];
        ?>

        <h5>Academic Year:
            <b><?php echo $studentInfo['year_level']; ?></b>
        </h5>
        <h5>Course:
            <b><?php echo $courseName; ?></b>
        </h5>
    </div>
<?php
}
?>