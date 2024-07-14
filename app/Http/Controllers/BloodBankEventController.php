<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodBankEvent;
use App\Models\Donor;
use App\Models\Appointment;

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
public function dashboard()
{
    $bloodBankEvents = BloodBankEvent::where('date', '>=', now())->get();
    $totalUnits = BloodBankEvent::count(); 
    $topDonors = Donor::withCount('donations')->orderBy('donations_count', 'desc')->take(5)->get();
    $appointments = Appointment::all();
    
    return view('blood.blood_bank_dashboard', compact('bloodBankEvents', 'totalUnits', 'topDonors', 'appointments'));
}
    public function store(Request $request)
    {
       
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
       
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

    
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
