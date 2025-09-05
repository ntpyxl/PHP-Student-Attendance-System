<?php
require_once __DIR__ . '/user.php';

class Course extends User
{
    protected $courseTable = "courses";

    public function addCourse($data)
    {
        return $this->create($this->courseTable, $data);
    }

    public function editCourse($data, $id)
    {
        return $this->update($this->courseTable, $data, "course_id", $id);
    }

    public function getAllCourses()
    {
        return $this->readAll($this->courseTable);
    }

    public function getCourseByCode($code)
    {
        return $this->readOne($this->courseTable, "course_code", $code);
    }
}
