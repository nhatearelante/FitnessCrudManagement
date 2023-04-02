<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Payment;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['member', 'training'])->get();
        $trainings = Training::all();
        $members = Member::all();
        return view('payments.index', compact('payments', 'members', 'trainings'));
    }

    public function show(Payment $payment)
    {
        $payment->load('member', 'training');
        return view('payments.show', compact('payment'));
    }

    public function create()
    {
        return view('payments.create_modal');
    }

    public function store(Request $request)
    {
        $payment = Payment::create([
            'member_id' => $request->input('member_id'),
            'training_id' => $request->input('training_id'),
            'payment_amount' => $request->input('payment_amount'),
            'payment_method' => $request->input('payment_method'),
        ]);

        $url = URL::route('payments.index');
        $successMessage = 'Payment created successfully';
        return redirect()->route('payments.index')->with('success', $successMessage);

        // return redirect()->route('payments.index')->with('success', 'Payment added successfully.');
    }

    public function edit(Payment $payment)
    {
        $members = Member::all();
        $trainings = Training::all();
        return view('payments.edit', compact('payment', 'members', 'trainings'));
    }

    public function update(Request $request, Payment $payment)
    {
        $payment->update([
            'member_id' => $request->input('member_id'),
            'training_id' => $request->input('training_id'),
            'payment_amount' => $request->input('payment_amount'),
            'payment_method' => $request->input('payment_method'),
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully');
    }
}
