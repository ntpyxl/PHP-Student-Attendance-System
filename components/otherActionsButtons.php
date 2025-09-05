<div>
    <h1 class="text-xl font-semibold text-center">Other Actions</h1>
    <hr class="py-1">

    <div class="space-x-1 space-y-2">
        <?php
        if ($_SESSION['user_role'] === "student") { ?>
            <button
                id="fileAttendanceButton"
                class="border-2 px-2 py-1 border-black rounded-xl bg-blue-200 hover:scale-105 duration-150 cursor-pointer">
                File Attendance
            </button>
        <?php
        } elseif ($_SESSION['user_role'] === "admin") { ?>
            <button
                id="manageCoursesButton"
                class="border-2 px-2 py-1 border-black rounded-xl bg-blue-200 hover:scale-105 duration-150 cursor-pointer">
                Manage Courses
            </button>

            <button
                id="viewAttendancesButton"
                class="hidden border-2 px-2 py-1 border-black rounded-xl bg-blue-200 hover:scale-105 duration-150 cursor-pointer">
                View Attendances
            </button>
        <?php
        }
        ?>

        <button
            id="logoutButton"
            class="border-2 px-2 py-1 border-black rounded-xl bg-red-200 hover:scale-105 duration-150 cursor-pointer">
            Logout
        </button>
    </div>
</div>