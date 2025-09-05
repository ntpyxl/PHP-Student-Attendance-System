<?php
session_start();

session_unset();
session_destroy();

return array(
    "status" => 200,
    "message" => "Logout success."
);
