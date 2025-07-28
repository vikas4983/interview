<?php

namespace App\Http\Controllers;

use App\Models\QuestionAnswer;
use Illuminate\Http\Request;

class GuastController extends Controller
{
    public function guastNotes($uuid)
    {
        $data = QuestionAnswer::where('uuid', $uuid)->paginate(5);
        return view('guast', compact('data'));
    }
    public function guastCourse($language)
    {
        $data = QuestionAnswer::where('language', $language)->paginate(5);

        return view('guast', compact('data'));
    }
}
