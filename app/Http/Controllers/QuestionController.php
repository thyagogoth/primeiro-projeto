<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\StoreRequest;
use App\Models\Question;
use Illuminate\Http\{RedirectResponse};

class QuestionController extends Controller
{
    public function store(StoreRequest $request): RedirectResponse
    {

        Question::query()
                ->create($request->validated());

        return to_route('dashboard');
    }

}
