<x-app-layout>
    <div class="flex h-full">

        <!-- Sidebar -->
        <aside class="w-1/4 bg-white p-6 shadow-md">
          <div class="mb-8">
            <h2 class="text-lg font-semibold">Menu</h2>
            <input class="mt-2 w-full p-2 border rounded-lg" type="text" placeholder="Search" />
          </div>
    
          <!-- Tasks Section -->
          <div>
            <h3 class="text-sm font-semibold mb-4">TASKS</h3>
            <ul class="space-y-2">
              <li class="flex items-center justify-between">
                <span>Upcoming</span>
                <span class="text-gray-400">{{$countUpcoming}}</span>
              </li>
              <li class="flex items-center justify-between">
                <span>Today</span>
                <span class="text-gray-400">{{$countToday}}</span>
              </li>
              <li>Calendar</li>
              <li>Sticky Wall</li>
            </ul>
          </div>
    
          <!-- Lists Section -->
          <div class="mt-8">
            <h3 class="text-sm font-semibold mb-4">LISTS</h3>
            <ul class="space-y-2">
              <li class="flex items-center">
                <span class="h-3 w-3 bg-red-500 rounded-full mr-2"></span>Personal
                <span class="ml-auto text-gray-400">3</span>
              </li>
              <li class="flex items-center">
                <span class="h-3 w-3 bg-blue-500 rounded-full mr-2"></span>Work
                <span class="ml-auto text-gray-400">6</span>
              </li>
              <li class="flex items-center">
                <span class="h-3 w-3 bg-yellow-500 rounded-full mr-2"></span>List 1
                <span class="ml-auto text-gray-400">3</span>
              </li>
            </ul>
            <button class="mt-4 w-full text-blue-500">+ Add New List</button>
          </div>
    
          <!-- Tags Section -->
          <div class="mt-8">
            <h3 class="text-sm font-semibold mb-4">TAGS</h3>
            <div class="space-x-2">
              <span class="inline-block bg-green-100 text-green-600 px-3 py-1 rounded-full">Tag 1</span>
              <span class="inline-block bg-pink-100 text-pink-600 px-3 py-1 rounded-full">Tag 2</span>
              <button class="text-blue-500">+ Add Tag</button>
            </div>
          </div>
    
          <!-- Settings and Sign Out -->
          <div class="mt-8 space-y-4">
            <button class="w-full text-gray-600">Settings</button>
            <button class="w-full text-red-500">Sign out</button>
          </div>
        </aside>
    
        <!-- Main Content -->
        <main class="flex-1 p-8">
          <!-- Task List Section -->
          <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Today <span class="text-gray-400">{{$countToday}}</span></h2>
        
            <!-- Button with link to the create task route -->
            <a href="{{ route('dash.create') }}">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">+ Add New Task</button>
            </a>
          </div>
    
          <!-- Task Items -->
          <div class="space-y-4">
            @foreach ($datas as $data)
            <div class="bg-white p-4 shadow-md rounded-lg flex items-center justify-between">
                <div>
                    <input type="checkbox" class="mr-4">
                    <!-- Display title and due date -->
                    <span class="font-semibold">{{ $data->title }}</span>
                    <span class="text-gray-500 ml-2">(Due: {{ \Carbon\Carbon::parse($data->due_date)->format('M d, Y') }})</span>
                </div>
        
                <!-- Buttons Section -->
                <div class="flex items-center space-x-4">
                    <!-- View and Edit buttons on the left side -->
                    <div>
                        <a href="{{ route('dash.show', $data) }}" class="text-blue-500 hover:underline">View</a>
                        <a href="{{ route('dash.edit', $data) }}" class="text-green-500 hover:underline ml-4">Edit</a>
                    </div>
                    
                    <!-- Delete button on the right side -->
                    <form action="{{ route('dash.destroy', $data) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
          </div>
        </main>
    
        {{-- <!-- Task Details Section -->
        <aside class="w-1/4 bg-white p-6 shadow-md">
          <h3 class="text-lg font-semibold mb-4">Task: Renew driver's license</h3>
          <div class="mb-4">
            <h4 class="text-sm font-semibold">Description</h4>
            <textarea class="w-full p-2 border rounded-lg" rows="4"></textarea>
          </div>
    
          <!-- List and Date Section -->
          <div class="mb-4">
            <label class="block text-sm font-semibold mb-2">List</label>
            <select class="w-full p-2 border rounded-lg">
              <option>Personal</option>
              <option>Work</option>
            </select>
          </div>
    
          <div class="mb-4">
            <label class="block text-sm font-semibold mb-2">Due Date</label>
            <input type="date" class="w-full p-2 border rounded-lg" />
          </div>
    
          <!-- Tags Section -->
          <div class="mb-4">
            <h4 class="text-sm font-semibold mb-2">Tags</h4>
            <div class="flex space-x-2">
              <span class="inline-block bg-green-100 text-green-600 px-3 py-1 rounded-full">Tag 1</span>
              <button class="text-blue-500">+ Add Tag</button>
            </div>
          </div>
    
          <!-- Subtasks Section -->
          <div class="mb-4">
            <h4 class="text-sm font-semibold mb-2">Subtasks:</h4>
            <button class="text-blue-500">+ Add New Subtask</button>
          </div>
    
          <!-- Action Buttons -->
          <div class="flex justify-between">
            <button class="bg-red-500 text-white px-4 py-2 rounded-lg">Delete Task</button>
            <button class="bg-green-500 text-white px-4 py-2 rounded-lg">Save changes</button>
          </div>
        </aside> --}}
    
      </div>
</x-app-layout>
