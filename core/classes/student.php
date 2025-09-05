<?php
require_once __DIR__ . '/user.php';

class Student extends User
{
    protected $studentTable = "students";
    protected $attendanceTable = "attendance";

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
}
