<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;

class QuestionController extends Controller
{
    public function create(Survey $survey): View
    {
        return view('questions.create', ['survey' => $survey]);
    }

    public function store(Request $request, Survey $survey): RedirectResponse
    {
        $validatedData = $request->validate([
            'question_text' => 'required',
            'type' => 'required|in:text,multiple_choice',
            'options' => 'array|required_if:type,multiple_choice',
            'options.*' => 'required|string'
        ]);

        $validatedData['survey_id'] = $survey->id;

        $question = Question::create($validatedData);

        if ($validatedData['type'] == 'multiple_choice') {
            foreach ($validatedData['options'] as $option) {
                Option::create([
                    'question_id' => $question->id,
                    'option_text' => $option,
                ]);
            }
        }

        return redirect()->route('questions.create', $survey)->with('status', 'Question added successfully!');
    }
}
