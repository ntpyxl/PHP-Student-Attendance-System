<div id="viewExcuseModal" class="hidden fixed inset-0 bg-black/80 items-center justify-center">
    <div class="bg-white rounded-2xl shadow-lg w-[60vw] p-6">
        <h2 class="text-xl font-semibold">Viewing Excuse Letter</h2>

        <div class="flex flex-col p-6 bg-white rounded-xl">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                <h5 id="studentName" class="text-2xl font-semibold text-gray-800"></h5>
                <p class="text-gray-600">
                    Year <span id="studentYear"></span> -
                    <span id="studentCourse"></span>
                </p>
            </div>

            <div class="pb-4">
                <p class="text-gray-600 text-sm">
                    To be excused on
                    <span id="excuseDate" class="font-medium text-gray-800"></span>
                </p>
            </div>

            <div class="max-h-[60vh] mt-3 overflow-y-auto">
                <h6 class="text-gray-700 font-semibold mb-1">Excuse Letter</h6>
                <p id="excuseContent" class="text-gray-700 leading-relaxed whitespace-pre-line"></p>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <select
                id="selectExcuseStatus"
                class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
                <option value="pending" disabled selected>Pending</option>
                <option value="approved">Approve</option>
                <option value="rejected">Reject</option>
            </select>
            <button
                id="closeExcuseModalButton"
                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:scale-105 duration-150 cursor-pointer">
                Close
            </button>
        </div>
    </div>
</div>