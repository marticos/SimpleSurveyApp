<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Response;

class ResponseController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'survey_id' => 'required|exists:surveys,id',
            'responses.*.response_text' => 'nullable|string',
            'responses.*.option_id' => 'nullable|integer|exists:options,id',
        ]);

        // Validate that at least one of response_text or option_id is provided for each response
        foreach ($request->responses as $response) {
            if (!isset($response['response_text']) && !isset($response['option_id'])) {
                return back()->withErrors(['responses' => 'Each response must have a response_text or option_id']);
            }
        }

        foreach ($request->responses as $questionId => $response) {
            Response::create([
                'user_id' => null, // only anonymous for now.
                'survey_id' => $request->survey_id,
                'question_id' => $questionId,
                'option_id' => $response['option_id']??null,
                'response_text' => $response['response_text']??null,
            ]);
        }

        return redirect()->route('surveys.userIndex')->with('status', 'Survey completed!');
    }

}
