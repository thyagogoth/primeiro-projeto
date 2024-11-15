<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\{RedirectResponse};

class QuestionController extends Controller
{
    public function store(): RedirectResponse
    {

        $attributes = request()->validate([
            //            required|min:10|max:255|ends_with:?
            'question' => 'required',
        ]);

        $question = Question::query()
                ->create($attributes);

        return to_route('dashboard');
    }

}
