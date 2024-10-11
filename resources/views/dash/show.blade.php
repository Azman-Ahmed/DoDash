<x-app-layout>
    <div class="flex flex-col items-center p-6">
        <div class="bg-white p-6 shadow-md rounded-lg w-full max-w-lg">
            <div class="data-body mb-6">
                <h1 class="text-2xl font-bold mb-4">{{ $dash->title }}</h1> <!-- Title -->
                <p class="mb-2"><strong>Description:</strong> {{ $dash->description }}</p> <!-- Full Description -->
                <p class="mb-2"><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($dash->due_date)->format('d M, Y') }}</p> <!-- Due Date -->
                <p class="mb-2"><strong>Status:</strong> {{ ucfirst($dash->status) }}</p> <!-- Status with first letter capitalized -->
                <p class="mb-2"><strong>Created At:</strong> {{ $dash->created_at->format('d M, Y') }}</p> <!-- Formatted Created At -->
                <p class="mb-2"><strong>Updated At:</strong> {{ $dash->updated_at->format('d M, Y') }}</p> <!-- Formatted Updated At -->
            </div>

            <div class="buttons flex space-x-4">
                <a href="{{ route('dash.edit', $dash) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Edit</a> <!-- Edit Button -->
                <form action="{{ route('dash.destroy', $dash) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Delete</button> <!-- Delete Button -->
                </form>
                <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline">Back to List</a> <!-- Back to List Link -->
            </div>
        </div>
    </div>
</x-app-layout>
