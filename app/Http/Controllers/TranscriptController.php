<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transcript;

class TranscriptController extends Controller
{
    public function index()
    {
        $transcripts = Transcript::orderBy('created_at', 'DESC')->paginate(10);
        return view('transcripts.index', compact('transcripts'));
    }
}
