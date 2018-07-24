<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transcript;
use App\User;

class TranscriptController extends Controller
{
    public function index()
    {
        $transcripts = Transcript::with('user')->orderBy('created_at', 'DESC')->get();

        return view('transcripts.index', compact('transcripts'));
    }

    public function create()
    {
        $users = User::orderBy('name', 'ASC')->get();

        return view('transcripts.create', compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'project' => 'required|string|max:50',
            'idi' => 'required|integer',
            'date' => 'required|date',
            'day' => 'required|string|max:10',
            'time' => 'required|string|max:10',
            'moderator' => 'required|string|max:50',
            'criteria' => 'required',
            'body' => 'nullable',
            'user_id' => 'required|exists:users,id'
        ]);

        try {
            $transcripts = Transcript::create([
                'project' => $request->project,
                'idi' => $request->idi,
                'date' => $request->date,
                'day' => $request->day,
                'time' => $request->time,
                'moderator' => $request->moderator,
                'criteria' => $request->criteria,
                'criteria' => $request->criteria,
                'body' => $request->body,
                'user_id' => $request->user_id
            ]);

            return redirect(route('transcript.index'))->with(['success' => '<strong>' . $transcripts->project . '</strong> has been submitted.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $transcripts = Transcript::findOrFail($id);
        
        $transcripts->delete();

        return redirect()->back()->with(['success' => '<strong>' . $transcripts->project . '</strong> was deleted.']);
    }

    public function edit($id)
    {
        $transcripts = Transcript::findOrFail($id);

        $users = User::orderBy('name', 'ASC')->get();

        return view('transcripts.edit', compact('transcripts', 'users'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'project' => 'required|string|max:50',
            'idi' => 'required|integer',
            'date' => 'required|date',
            'day' => 'required|string|max:10',
            'time' => 'required|string|max:10',
            'moderator' => 'required|string|max:50',
            'criteria' => 'required',
            'body' => 'nullable',
            'user_id' => 'required|exists:users,id'
        ]);

        try {
            $transcripts = Transcript::findOrFail($id);

            $transcripts->update([
                'project' => $request->project,
                'idi' => $request->idi,
                'date' => $request->date,
                'day' => $request->day,
                'time' => $request->time,
                'moderator' => $request->moderator,
                'criteria' => $request->criteria,
                'criteria' => $request->criteria,
                'body' => $request->body,
                'user_id' => $request->user_id
            ]);

            return redirect(route('transcript.index'))->with(['success' => '<strong>' . $transcripts->project . '</strong> has been modified.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
