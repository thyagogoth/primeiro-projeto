<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {

        $questions = Question::query()->get();

        return view('dashboard', compact('questions'));
    }
}
