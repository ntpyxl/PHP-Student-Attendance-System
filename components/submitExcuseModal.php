<div id="submitExcuseModal" class="hidden fixed inset-0 bg-black/80 items-center justify-center">
    <div class="bg-white rounded-2xl shadow-lg w-[60vw] p-6">
        <h2 class="text-xl font-semibold">Submit Excuse Letter</h2>

        <div class="flex flex-col gap-4 py-4">
            <div class="flex flex-col">
                <label for="dateField" class="mb-1 font-medium">Select Date</label>
                <input
                    id="excuseDateField"
                    type="date"
                    class="border-2 border-gray-400 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500"
                    required>
            </div>

            <div class="flex flex-col">
                <label for="excuseTextField" class="mb-1 font-medium">Your Excuse</label>
                <textarea id="excuseTextField"
                    class="w-full h-[30vh] px-4 py-2 border rounded-lg focus:border-blue-200"
                    placeholder="Type your excuse here..."></textarea>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <button
                id="confirmSubmitExcuseButton"
                class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:scale-105 duration-150 cursor-pointer" disabled>
                Submit
            </button>
            <button
                id="closeExcuseModalButton"
                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:scale-105 duration-150 cursor-pointer">
                Close
            </button>
        </div>
    </div>
</div>