<?php

namespace App\Http\Controllers;

use App\Models\QuestionAnswer;
use App\Services\languageService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $languageService;
    
    public function __construct(languageService $languageService)
    {
        $this->languageService = $languageService;
    }
    public function dashboard()
    {
        $addCources = $this->languageService->getcources();
       
        return view('dashboard', compact( 'addCources'));
    }
}
