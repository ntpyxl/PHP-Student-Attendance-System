<?php
session_start();

foreach (glob(__DIR__ . "/functions/*.php") as $filename) {
    require_once $filename;
}

if (isset($_POST['refreshAttendanceAdminListRequest'])) {
    $yearLevel = $_POST['yearLevel'];
    $courseCode = $_POST['courseCode'];

    $functionResult = refreshAttendanceAdminList($yearLevel, $courseCode);

    foreach ($functionResult as $attendance) {
        $studentId   = $attendance['student_id'];
        $fullName    = $attendance['first_name'] . ' ' . $attendance['last_name'];
        $yearLevel   = $attendance['year_level'];
        $courseName  = $attendance['course_name'];
        $date        = date('F j, Y', strtotime($attendance['attendance_date']));
        $timeIn      = date('g:i:s A', strtotime($attendance['time_in']));
        $status      = strtoupper($attendance['status']);
        $statusClass = $attendance['status'] === 'present' ? 'bg-green-300' : 'bg-red-300';

        echo "
        <tr>
            <td class='border-2 border-black px-2 py-1'>$studentId</td>
            <td class='border-2 border-black px-2 py-1'>$fullName</td>
            <td class='border-2 border-black px-2 py-1'>$yearLevel</td>
            <td class='border-2 border-black px-2 py-1'>$courseName</td>
            <td class='border-2 border-black px-2 py-1'>$date</td>
            <td class='border-2 border-black px-2 py-1'>$timeIn</td>
            <td class='border-2 border-black px-2 py-1 font-semibold $statusClass'>$status</td>
        </tr>
        ";
    }
}

if (isset($_POST['refreshExcuseLettersAdminListRequest'])) {
    $yearLevel = $_POST['yearLevel'];
    $courseCode = $_POST['courseCode'];

    $functionResult = refreshExcuseLettersAdminList($yearLevel, $courseCode);

    foreach ($functionResult as $attendance) {
        $excuseId    = $attendance['letter_id'];
        $studentId   = $attendance['student_id'];
        $fullName    = $attendance['first_name'] . ' ' . $attendance['last_name'];
        $yearLevel   = $attendance['year_level'];
        $courseName  = $attendance['course_name'];
        $date        = date('F j, Y', strtotime($attendance['excuse_date']));
        $status      = strtoupper($attendance['status']);
        $statusClass = $attendance['status'] === 'approved'
            ? 'bg-green-200'
            : ($attendance['status'] === 'pending'
                ? 'bg-teal-200'
                : 'bg-red-300');

        echo "
        <tr>
            <td class='border-2 border-black px-2 py-1'>$studentId</td>
            <td class='border-2 border-black px-2 py-1'>$fullName</td>
            <td class='border-2 border-black px-2 py-1'>$yearLevel</td>
            <td class='border-2 border-black px-2 py-1'>$courseName</td>
            <td class='border-2 border-black px-2 py-1'>$date</td>
            <td class='border-2 border-black px-2 py-1 font-semibold $statusClass'>$status</td>
            <td class='border-2 border-black px-2 py-1'>
                <button
                    data-excuse-id=" . $excuseId . "
                    class='border-2 px-2 py-1 border-black rounded-xl bg-blue-200 hover:scale-105 duration-150 cursor-pointer'>
                    View
                </button>
            </td>
        </tr>
        ";
    }
}
