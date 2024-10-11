<x-app-layout>
    <div class="flex flex-col items-center p-6">
        <h1 class="text-3xl font-bold mb-4">Create New Task</h1>

        <form action="{{ route('dash.store') }}" method="POST" class="bg-white p-6 shadow-md rounded-lg w-full max-w-lg">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-semibold mb-2">Title:</label>
                <input type="text" id="title" name="title" placeholder="Enter task title..." required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" />
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-semibold mb-2">Description:</label>
                <textarea id="description" name="description" placeholder="Enter task description..." required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500"></textarea>
            </div>

            <div class="mb-4">
                <label for="due_date" class="block text-sm font-semibold mb-2">Due Date:</label>
                <input type="date" id="due_date" name="due_date" required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" />
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-semibold mb-2">Status:</label>
                <select id="status" name="status" required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('dash.index') }}" class="text-blue-500 hover:underline">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
