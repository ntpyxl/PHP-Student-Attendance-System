<h1 class="text-xl font-semibold text-center">Manage Courses</h1>
<hr class="py-1">

<div class="flex flex-col justify-center items-center">
    <div class="flex flex-row space-x-3 w-full max-w-[500px]">
        <div class="flex flex-col flex-2">
            <label for="courseNameField" class="ml-2">Course Name</label>
            <input
                id="courseNameField"
                type="text"
                class="border-2 px-2 py-1 border-black rounded-2xl w-full"
                required>
        </div>

        <div class="flex flex-col flex-1">
            <label for="courseCodeField" class="ml-2">Course Code</label>
            <input
                id="courseCodeField"
                type="text"
                class="border-2 px-2 py-1 border-black rounded-2xl w-full"
                required>
        </div>

        <div class="flex flex-col">
            <label for="courseTimeInField" class="ml-2">Time In</label>
            <input
                id="courseTimeInField"
                type="time"
                step="1"
                class=" border-2 px-3 py-1 border-black rounded-2xl focus:outline-none focus:border-blue-500"
                required>
        </div>
    </div>


    <div class="flex py-3 justify-end gap-3">
        <button
            id="addCourseButton"
            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:scale-105 duration-150 cursor-pointer">
            Add Course
        </button>
        <button
            id="clearFieldsButton"
            class="px-4 py-2 bg-red-500 text-white rounded-lg hover:scale-105 duration-150 cursor-pointer">
            Clear Fields
        </button>
    </div>
</div>

<h1 class="text-xl font-semibold text-center">Course List</h1>
<hr class="py-1">

<div>
    <?php
    require_once __DIR__ . "/../core/classes/course.php";
    $course = new Course();

    $courseList = $course->getAllCourses();
    ?>
    <table>
        <tr>
            <th class="border-2 border-black px-2 py-1">Course ID</th>
            <th class="border-2 border-black px-2 py-1">Course Name</th>
            <th class="border-2 border-black px-2 py-1">Course Code</th>
            <th class="border-2 border-black px-2 py-1">Course Time in</th>
            <th class="border-2 border-black px-2 py-1">Actions</th>
        </tr>
        <?php
        foreach ($courseList as $course) {
        ?>
            <tr>
                <th class="border-2 border-black px-2 py-1">
                    <?php echo $course['course_id']; ?>
                </th>

                <th class="border-2 border-black px-2 py-1 font-normal">
                    <?php echo $course['course_name']; ?>
                </th>
                <th class="border-2 border-black px-2 py-1 font-normal">
                    <?php echo $course['course_code']; ?>
                </th>
                <th class="border-2 border-black px-2 py-1 font-normal">
                    <?php echo date(
                        "g:i:s A",
                        strtotime($course['course_time_in'])
                    ); ?>
                </th>
                <th class="border-2 border-black px-2 py-1 font-normal">
                    <button
                        data-course-id="<?php echo $course['course_id']; ?>"
                        data-course-name="<?php echo $course['course_name']; ?>"
                        data-course-code="<?php echo $course['course_code']; ?>"
                        data-course-time-in="<?php echo $course['course_time_in']; ?>"
                        class="editCourseButton px-2 py-1 bg-blue-500 text-white rounded-lg hover:scale-105 duration-150 cursor-pointer">
                        Edit
                    </button>
                </th>
            </tr>
        <?php
        }
        ?>
    </table>
</div>

<!-- MODALS -->
<?php require_once __DIR__ . "/editCourseModal.php"; ?>