<?php
require_once __DIR__ . '/user.php';

class Student extends User
{
    protected $studentTable = "students";
    protected $attendanceTable = "attendance";
    protected $excuseLetterTable = "excuse_letter";

    public function addStudent($data)
    {
        return $this->create($this->studentTable, $data);
    }

    public function getStudentByUserId($userId)
    {
        return $this->readOne($this->studentTable, "user_id", $userId);
    }

    public function getStudentByStudentId($studentId)
    {
        return $this->readOne($this->studentTable, "student_id", $studentId);
    }

    public function fileAttendance($data)
    {
        return $this->create($this->attendanceTable, $data);
    }

    public function viewAttendanceHistory($id)
    {
        return $this->readAllWhere($this->attendanceTable, "student_id", $id, "attendance_date DESC");
    }

    public function submitExcuse($data)
    {
        return $this->create($this->excuseLetterTable, $data);
    }

    public function getExcusesbyStudentId($studentId)
    {
        $where[] = "students.student_id = :student_id";
        $params['student_id'] = $studentId;

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
}
