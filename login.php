<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="styles.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <title>Student Attendance System</title>
</head>

<body>
    <h3 class="flex py-3 justify-center items-center text-3xl font-bold">Student Attendance System</h3>
    <div class="flex flex-col p-2 justify-center items-center">
        <div class="flex flex-col px-12 py-2 border-2 border-black justify-center items-center">
            <h5 class="py-1 text-xl font-semibold">Login Page</h5>

            <form id="loginUserForm" class="flex flex-col py-2 space-y-3">
                <div class="flex flex-col">
                    <label for="usernameField" class="ml-1">Username</label>
                    <input
                        id="usernameField"
                        type="text"
                        class="border-2 px-2 border-black rounded-2xl"
                        required></input>
                </div>

                <div class="flex flex-col">
                    <label for="passwordField" class="ml-1">Password</label>
                    <input
                        id="passwordField"
                        type="password"
                        class="border-2 px-2 border-black rounded-2xl"
                        required></input>
                </div>

                <button
                    class="border-2 my-2 py-1 border-black rounded-2xl bg-green-200 hover:scale-105 duration-150 cursor-pointer">
                    Login
                </button>
            </form>
        </div>
        <p>
            Not yet registered?
            <a
                href="register.php"
                class="text-blue-700 hover:underline">
                Create an account!
            </a>
        </p>
    </div>

    <script src="core/scripts/directories.js"></script>
    <script src="core/scripts/accountScripts.js"></script>
</body>

</html>