<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodBankEvent;

class BloodBankEventController extends Controller
{
    public function create()
    {
        return view('blood.events.create');
    }
    public function index()
{
    $bloodBankEvents = BloodBankEvent::where('date', '>=', now())->get();
    return view('dashboard', compact('bloodBankEvents'));
}

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create a new blood bank event
        BloodBankEvent::create([
            'name' => $request->name,
            'date' => $request->date,
            'event_time' => $request->time,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        return redirect()->route('bloodbank.events.create')->with('success', 'Event created successfully!');
    }

    public function edit(BloodBankEvent $event)
    {
        return view('blood.events.edit', compact('event'));
    }

    public function update(Request $request, BloodBankEvent $event)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Update the blood bank event
        $event->update([
            'name' => $request->name,
            'date' => $request->date,
            'event_time' => $request->time,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        return redirect()->route('bloodbank.events.edit', $event)->with('success', 'Event updated successfully!');
    }

    public function destroy(BloodBankEvent $event)
    {
        // Delete the blood bank event
        $event->delete();

        return redirect()->route('bloodbank.events.create')->with('success', 'Event deleted successfully!');
    }
}
