<div id="fileAttendanceModal" class="hidden fixed inset-0 bg-black/80 items-center justify-center">
    <div class="bg-white rounded-2xl shadow-lg w-[400px] p-6">
        <h2 class="text-xl font-semibold">File Attendance</h2>

        <div class="flex flex-col gap-4 w-64 py-4">
            <div class="flex flex-col">
                <label for="dateField" class="mb-1 font-medium">Select Date</label>
                <input
                    id="attendanceDateField"
                    type="date"
                    class="border-2 border-gray-400 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500"
                    required>
            </div>

            <div class="flex flex-col">
                <label for="timeField" class="mb-1 font-medium">Select Time</label>
                <input
                    id="attendanceTimeField"
                    type="time"
                    step="1"
                    class=" border-2 border-gray-400 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500"
                    required>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <button
                id="submitAttendanceButton"
                class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:scale-105 duration-150 cursor-pointer">
                Submit
            </button>
            <button
                id="closeAttendanceModalButton"
                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:scale-105 duration-150 cursor-pointer">
                Close
            </button>
        </div>
    </div>
</div>