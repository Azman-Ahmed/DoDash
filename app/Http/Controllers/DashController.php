<?php

namespace App\Http\Controllers;

use App\Models\Dash;
use GuzzleHttp\Psr7\Message;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function dashboard()
    {
        $userId = request()->user()->id;
        $today = now()->toDateString(); // Get today's date in 'Y-m-d' format

        // Fetch paginated data for the dashboard
        $datas = Dash::query()
            ->where('user_id', $userId)
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        // Count tasks with today's date
        $countToday = Dash::where('user_id', $userId)
            ->whereDate('due_date', $today) // Assuming you have a 'due_date' field
            ->count();

        // Count tasks with a date greater than today
        $countUpcoming = Dash::where('user_id', $userId)
            ->whereDate('due_date', '>', $today)
            ->count();

        // dd($countToday, $countUpcoming);

        return view('dash.dashboard', compact('datas', 'countToday', 'countUpcoming'));
    }

    
    public function index()
    {
        $datas = Dash::query()
            ->where('user_id', request()->user()->id)
            ->orderBy('created_at', 'asc')->paginate(5);
        return view('dash.index', compact('datas'));
    }

    public function create()
    {
        return view('dash.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'due_date' => ['required', 'date'],
            'status' => ['required', 'string']
        ]);


        $data['user_id'] = $request->user()->id;

        $dash = Dash::create($data);

        return redirect()->route('dash.show', $dash)->with('message', 'Banaisi bhai');
    }


    
    public function show(Dash $dash)
    {
        // dd($dash); // This will display the details of the $dash instance.
        if($dash->user_id !== request()->user()->id)
        {
            abort(403);
        }
        return view('dash.show', compact('dash')); // Pass $dash to the view.
    }

    
    public function edit(Dash $dash)
    {
        if($dash->user_id !== request()->user()->id)
        {
            abort(403);
        }
        return view('dash.edit', compact('dash'));
    }

    
    public function update(Request $request, Dash $dash)
    {
        if($dash->user_id !== request()->user()->id)
        {
            abort(403);
        }
        $data = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'due_date' => ['required', 'date'],
            'status' => ['required', 'string']
        ]);

        $dash->update($data);

        return redirect()->route('dash.show', $dash)->with('message', 'korsi update bhai');
    
    }

    
    public function destroy(Dash $dash)
    {
        if($dash->user_id !== request()->user()->id)
        {
            abort(403);
        }
        $dash->delete();
        return redirect()->route('dash.index')->with('message', 'deleted');
    }
}
