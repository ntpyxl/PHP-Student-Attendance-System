<div class="col-span-1">
    <h1 class="text-xl font-semibold text-center">Your Attendance History</h1>
    <hr class="py-1">

    <div>
        <?php
        require_once __DIR__ . "/../core/classes/student.php";
        $student = new Student();

        $studentAttendanceData = $student->viewAttendanceHistory($_SESSION['user_role_id']);
        ?>
        <table>
            <tr>
                <th class="border-2 border-black px-2 py-1">Status</th>
                <th class="border-2 border-black px-2 py-1">Date</th>
                <th class="border-2 border-black px-2 py-1">Time</th>
            </tr>
            <?php
            foreach ($studentAttendanceData as $attendance) {
            ?>
                <tr>
                    <th class="border-2 border-black px-2 py-1 
                                <?php echo $attendance['status'] === 'present' ?
                                    'bg-green-300' : 'bg-red-300';
                                ?>">
                        <?php echo strtoupper($attendance['status']); ?>
                    </th>

                    <th class="border-2 border-black px-2 py-1 font-normal">
                        <?php echo date(
                            "F j, Y",
                            strtotime($attendance['attendance_date'])
                        ); ?>
                    </th>
                    <th class="border-2 border-black px-2 py-1 font-normal">
                        <?php echo date(
                            "g:i:s A",
                            strtotime($attendance['time_in'])
                        ); ?>
                    </th>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>

<div class="col-span-1">
    <h1 class="text-xl font-semibold text-center">Your Excuse Letters</h1>
    <hr class="py-1">

    <div>
        <?php
        require_once __DIR__ . "/../core/classes/student.php";
        $student = new Student();

        $studentExcusesData = $student->getExcusesbyStudentId($_SESSION['user_role_id']);
        ?>
        <table>
            <tr>
                <th class="border-2 border-black px-2 py-1">Status</th>
                <th class="border-2 border-black px-2 py-1">Date</th>
                <th class="border-2 border-black px-2 py-1">Actions</th>
            </tr>
            <?php
            foreach ($studentExcusesData as $excuse) {
            ?>
                <tr>
                    <th class="border-2 border-black px-2 py-1 
                                <?php echo $excuse['status'] === 'approved'
                                    ? 'bg-green-200'
                                    : ($excuse['status'] === 'pending'
                                        ? 'bg-teal-200'
                                        : 'bg-red-300');
                                ?>">
                        <?php echo strtoupper($excuse['status']); ?>
                    </th>

                    <th class="border-2 border-black px-2 py-1 font-normal">
                        <?php echo date(
                            "F j, Y",
                            strtotime($excuse['excuse_date'])
                        ); ?>
                    </th>

                    <td class="border-2 border-black px-2 py-1">
                        <button
                            data-student-fullname="<?php echo $excuse['first_name'] . " " . $excuse['last_name']; ?>"
                            data-student-yearlevel="<?php echo $excuse['year_level']; ?>"
                            data-student-coursename="<?php echo $excuse['course_name']; ?>"
                            data-excuse-date="<?php echo $excuse['excuse_date']; ?>"
                            data-excuse-content="<?php echo $excuse['content']; ?>"
                            data-excuse-status="<?php echo $excuse['status']; ?>"
                            class='viewExcuseLetterButton border-2 px-2 py-1 border-black rounded-xl bg-blue-200 hover:scale-105 duration-150 cursor-pointer'>
                            View
                        </button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>