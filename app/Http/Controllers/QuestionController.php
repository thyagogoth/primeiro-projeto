<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\StoreRequest;
use App\Models\Question;
use Illuminate\Http\{RedirectResponse};
use Illuminate\View\View;

class QuestionController extends Controller
{
    public function index(): View
    {
        $questions = Question::query()
                            ->get();

        return view('dashboard', compact('questions'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {

        Question::query()
                ->create($request->validated());

        return to_route('dashboard');
    }

}
