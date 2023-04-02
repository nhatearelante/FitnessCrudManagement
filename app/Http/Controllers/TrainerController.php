<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;

class TrainerController extends Controller
{
    public function index()
    {
        // Eager load the trainings relationship for all trainers
        $trainers = Trainer::with('trainings')->get();

        return view('trainers.index', compact('trainers'));
    }

    public function create()
    {
        return view('trainers.create_modal');
    }

    public function store(Request $request)
    {
        $trainer = new Trainer;
        $trainer->name = $request->name;
        $trainer->email = $request->email;
        $trainer->specialization = $request->specialization;
        $trainer->save();

        $url = URL::route('trainers.index');
        $successMessage = 'Trainer created successfully';
        return redirect()->route('trainers.index')->with('success', $successMessage);

        // return redirect('/trainers');
    }

    public function show($id)
    {
        $trainer = Trainer::with('trainings')->find($id);
        return view('trainers.show', compact('trainer'));
    }

    public function edit($id)
    {
        $trainer = Trainer::find($id);
        return view('trainers.edit', compact('trainer'));
    }

    public function update(Request $request, $id)
    {
        $trainer = Trainer::find($id);
        $trainer->name = $request->name;
        $trainer->email = $request->email;
        $trainer->specialization = $request->specialization;
        $trainer->save();
        return redirect('/trainers');
    }

    public function destroy($id)
    {
        $trainer = Trainer::find($id);
        $trainer->delete();
        return redirect()->route('trainers.index')->with('success', 'Trainer deleted successfully');
    }
}
