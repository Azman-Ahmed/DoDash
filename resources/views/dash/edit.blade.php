<x-app-layout>
    <div class="flex flex-col items-center p-6">
        <h1 class="text-3xl font-bold mb-4">Edit Task</h1>

        <form action="{{ route('dash.update', $dash) }}" method="POST" class="bg-white p-6 shadow-md rounded-lg w-full max-w-lg">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-semibold mb-2">Title:</label>
                <input type="text" name="title" id="title" value="{{ $dash->title }}" required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Enter task title..." />
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-semibold mb-2">Description:</label>
                <textarea name="description" id="description" placeholder="Enter task description..." required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500">{{ $dash->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="due_date" class="block text-sm font-semibold mb-2">Due Date:</label>
                <input type="date" name="due_date" id="due_date" value="{{ $dash->due_date }}" required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" />
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-semibold mb-2">Status:</label>
                <select name="status" id="status" required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                    <option value="pending" {{ $dash->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $dash->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="in_progress" {{ $dash->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                </select>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('dash.index') }}" class="text-blue-500 hover:underline">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
