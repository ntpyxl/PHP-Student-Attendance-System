<?php
require_once __DIR__ . '/database.php';

class User extends Database
{
    protected $userTable = "users";

    public function addUser($data)
    {
        return $this->create($this->userTable, $data);
    }

    public function getUserById($userId)
    {
        return $this->readOne($this->userTable, "user_id", $userId);
    }

    public function getUserByUsername($username)
    {
        return $this->readOne($this->userTable, "username", $username);
    }
}
