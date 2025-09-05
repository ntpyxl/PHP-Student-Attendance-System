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