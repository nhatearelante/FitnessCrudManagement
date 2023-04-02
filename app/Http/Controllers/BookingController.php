<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Booking;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['training', 'member'])->get();
        $trainings = Training::all();
        $members = Member::all();
        return view('bookings.index', compact('bookings', 'members', 'trainings'));
    }
    
    public function create()
    {
        return view('bookings.create_modal');
    }

    public function store(Request $request)
    {
        $booking = new Booking();
        $booking->member_id = $request->input('member_id');
        $booking->training_id = $request->input('training_id');
        $booking->booking_time = $request->input('booking_time');
        $booking->save();
        
        $url = URL::route('bookings.index');
        $successMessage = 'Booking created successfully';
        return redirect()->route('bookings.index')->with('success', $successMessage);
        // return redirect()->route('bookings.index');
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);

        return view('bookings.show', [
            'booking' => $booking
        ]);
    }

    public function edit($id)
    {
        $booking = Booking::find($id);
        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->member_id = $request->input('member_id');
        $booking->training_id = $request->input('training_id');
        $booking->booking_time = $request->input('booking_time');
        $booking->save();

        return redirect()->route('bookings.index');
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();

        return redirect()->route('bookings.index');
    }
}
