<x-app-layout>
    <div class="data-container">
        <a href="{{ route('dash.create') }}">
            New Note
        </a>
        <div class="datas">
            @foreach ($datas as $dash)
                <div class="data">
                    <div class="data-body">
                        <h1>{{$dash->id}}</h1>
                        <h3>{{ $dash->title }}</h3>
                        <p><strong>Description:</strong> {{ Str::words($dash->description, 20) }}</p> 
                        <p><strong>Due Date:</strong> {{ $dash->due_date }}</p> 
                        <p><strong>Status:</strong> {{ ucfirst($dash->status) }}</p>
                        <p><strong>Created At:</strong> {{ $dash->created_at->format('d M, Y') }}</p>
                    </div>
                    <div class="buttons">
                        <a href="{{ route('dash.show', $dash) }}" class="btn2">View</a>
                        <a href="{{ route('dash.edit', $dash) }}" class="btn2">Edit</a>
                        <form action="{{ route('dash.destroy', $dash) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn3">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach

            {{-- Pagination --}}
            {{ $datas->links() }}
        </div>
    </div>
</x-app-layout>
 