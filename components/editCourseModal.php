<div id="editCourseModal" class="hidden fixed inset-0 bg-black/80 items-center justify-center">
    <div class="bg-white rounded-2xl shadow-lg w-[400px] p-6">
        <h2 class="text-xl font-semibold">Edit Course</h2>

        <div class="flex flex-col gap-4 w-64 py-4">
            <div class="flex flex-col flex-2">
                <label for="editCourseNameField" class="ml-2">Course Name</label>
                <input
                    id="editCourseNameField"
                    type="text"
                    class="border-2 px-2 py-1 border-black rounded-2xl w-full"
                    required>
            </div>

            <div class="flex flex-col flex-1">
                <label for="editCourseCodeField" class="ml-2">Course Code</label>
                <input
                    id="editCourseCodeField"
                    type="text"
                    class="border-2 px-2 py-1 border-black rounded-2xl w-full"
                    required>
            </div>

            <div class="flex flex-col">
                <label for="editCourseTimeInField" class="ml-2">Time In</label>
                <input
                    id="editCourseTimeInField"
                    type="time"
                    step="1"
                    class=" border-2 px-3 py-1 border-black rounded-2xl focus:outline-none focus:border-blue-500"
                    required>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <button
                id="confirmEditCourseButton"
                class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:scale-105 duration-150 cursor-pointer">
                Save
            </button>
            <button
                id="cancelEditCourseButton"
                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:scale-105 duration-150 cursor-pointer">
                Cancel
            </button>
        </div>
    </div>
</div>