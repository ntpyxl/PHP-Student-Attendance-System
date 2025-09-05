<h1 class="text-xl font-semibold text-center">Students' Attendance History</h1>
<hr class="py-1">

<div>
    <?php
    require_once __DIR__ . "/../core/classes/admin.php";
    $admin = new Admin();

    $allStudentAttendanceData = $admin->viewAttendanceByCourse();
    ?>

    <div class="flex flex-row space-x-3">
        <div class="flex flex-col flex-1">
            <label for="studentYearLevelField" class="ml-1">Year Level</label>
            <select
                id="studentYearLevelField"
                type="text"
                class="border-2 px-2 py-1 border-black rounded-2xl">
                <option value="0" selected>All Year Levels</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>

        <div class="flex flex-col flex-3">
            <label for="studentCourseField" class="ml-1">Course</label>
            <select
                id="studentCourseField"
                type="text"
                class="border-2 px-2 py-1 border-black rounded-2xl">

                <option value="None" selected>All Courses</option>

                <?php
                require_once __DIR__ . "/../core/classes/course.php";

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

    <table class="mt-3">
        <tr>
            <th class="border-2 border-black px-2 py-1">Student ID</th>
            <th class="border-2 border-black px-2 py-1">Student Name</th>
            <th class="border-2 border-black px-2 py-1">Year Level</th>
            <th class="border-2 border-black px-2 py-1">Course Name</th>
            <th class="border-2 border-black px-2 py-1">Attendance Date</th>
            <th class="border-2 border-black px-2 py-1">Attendance Time</th>
            <th class="border-2 border-black px-2 py-1">Status</th>
        </tr>
        <tbody id="allStudentAttendanceRows">
        </tbody>
    </table>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => refreshAttendanceAdminList());
</script>