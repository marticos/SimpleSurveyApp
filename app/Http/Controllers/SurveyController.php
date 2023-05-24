<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function index(): View
    {
        $surveys = Survey::all();

        return view('surveys.index', ['surveys' => $surveys]);
    }

    public function userIndex()
    {
        // Retrieve only surveys that should be visible to users.
        // $surveys = Survey::where('is_public', true)->get();
        // return view('surveys.userlist', ['surveys' => $surveys]);

        $surveys = Survey::all();
        return view('surveys.list', ['surveys' => $surveys]);
    }

    public function create(): View
    {
        return view('surveys.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $survey = Survey::create([
            'user_id' => $request->user()->id,
            'title' => $validatedData['title'],
            'description' => $validatedData['description']
        ]);

        return redirect()->route('questions.create', $survey)->with('status', 'Survey created successfully!');
    }

    public function show(Survey $survey): View
    {
        $survey->load('questions.options');
        return view('surveys.show', ['survey' => $survey]);
    }
}
