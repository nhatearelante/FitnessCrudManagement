<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::with('trainer')->get();
        $trainers = Trainer::all();
        return view('trainings.index', compact('trainings', 'trainers'));
    }

    public function create()
    {
        $trainers = Trainer::all();
        return view('trainings.create_modal', compact('trainers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'difficulty' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'trainer_id' => 'required|exists:trainers,id',
        ]);

        $training = Training::create($validatedData);
        
        $url = URL::route('trainings.index');
        $successMessage = 'Training created successfully';
        return redirect()->route('trainings.index')->with('success', $successMessage);

        // return redirect()->route('trainings.index')->with('success', 'Training created successfully.');
    }


    public function show($id)
    {
        $training = Training::findOrFail($id);
        return view('trainings.show', compact('training'));
    }

    public function edit($id)
    {
        $training = Training::findOrFail($id);
        $trainers = Trainer::all();
        return view('trainings.edit', compact('training', 'trainers'));
    }

    public function update(Request $request, $id)
    {
        $training = Training::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'difficulty' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'trainer_id' => 'required|exists:trainers,id'
        ]);

        $training->update($validatedData);

        return redirect()->route('trainings.index')->with('success', 'Training updated successfully!');
    }

    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        $training->delete();
        return redirect()->route('trainings.index')->with('success', 'Training deleted successfully!');
    }
}
