<?php
require_once __DIR__ . '/user.php';

class Admin extends User
{
    protected $adminTable = "admin";
    protected $excuseLetterTable = "excuse_letter";

    public function addAdmin($data)
    {
        return $this->create($this->adminTable, $data);
    }

    public function getAdminByUserId($userId)
    {
        return $this->readOne($this->adminTable, "user_id", $userId);
    }

    public function viewAttendanceByCourse($yearLevel = null, $courseCode = null)
    {
        $where = [];
        $params = [];

        if (!empty($yearLevel)) {
            $where[] = "students.year_level = :year";
            $params['year'] = $yearLevel;
        }

        if (!empty($courseCode)) {
            $where[] = "students.course_code = :courseCode";
            $params['courseCode'] = $courseCode;
        }

        return $this->readAllAdvanced(
            "students",

            "students.student_id,
            students.first_name, students.last_name,
            students.year_level,
            courses.course_name,
            attendance.attendance_date,
            attendance.time_in,
            attendance.status
            ",

            "INNER JOIN courses ON students.course_code = courses.course_code
            INNER JOIN attendance ON students.student_id = attendance.student_id",

            $where,
            $params,
            "attendance.attendance_date DESC"
        );
    }

    public function viewExcusesByCourse($yearLevel = null, $courseCode = null)
    {
        $where = [];
        $params = [];

        if (!empty($yearLevel)) {
            $where[] = "students.year_level = :year";
            $params['year'] = $yearLevel;
        }

        if (!empty($courseCode)) {
            $where[] = "students.course_code = :courseCode";
            $params['courseCode'] = $courseCode;
        }

        return $this->readAllAdvanced(
            "students",

            "excuse_letter.letter_id,
            students.student_id,
            students.first_name, students.last_name,
            students.year_level,
            courses.course_name,
            excuse_letter.content,
            excuse_letter.excuse_date,
            excuse_letter.status
            ",

            "INNER JOIN courses ON students.course_code = courses.course_code
            INNER JOIN excuse_letter ON students.student_id = excuse_letter.student_id",

            $where,
            $params,
            "excuse_letter.excuse_date DESC"
        );
    }

    public function editExcuse($data, $id)
    {
        return $this->update($this->excuseLetterTable, $data, "letter_id", $id);
    }
}
