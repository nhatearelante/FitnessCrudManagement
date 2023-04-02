<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create_modal');
    }


    public function store(Request $request)
    {
        $member = new Member();
        $member->name = $request->input('name');
        $member->email = $request->input('email');
        $member->address = $request->input('address');
        $member->gender = $request->input('gender');
        $member->save();

        $url = URL::route('members.index');
        $successMessage = 'Member created successfully';
        return redirect()->route('members.index')->with('success', $successMessage);

        // return redirect()->route('members.index')->with('success', 'Member created successfully');
    }

    public function show($id)
    {
        $member = Member::find($id);

        return view('members.show', compact('member'));
    }

    public function edit($id)
    {
        $member = Member::find($id);
        return view('members.edit', ['member' => $member]);
    }

    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        $member->name = $request->input('name');
        $member->email = $request->input('email');
        $member->address = $request->input('address');
        $member->gender = $request->input('gender');
        $member->save();
        return redirect()->route('members.index')->with('success', 'Member updated successfully');
    }

    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully');
    }
}
