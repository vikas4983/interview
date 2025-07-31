<?php

namespace App\Http\Controllers;

use App\Models\LikeDislike;
use App\Models\QuestionAnswer;
use Illuminate\Http\Request;

class GuastController extends Controller
{
    public function home()
    {
        $ip = request()->ip();
        $iqa = QuestionAnswer::with(['likes' => function ($q) use ($ip) {
            $q->where('ip', $ip)->latest();
        }])->latest()->paginate(6);
        return view('welcome', compact('iqa'));
    }


    public function guastNotes($uuid)
    {
        $data = QuestionAnswer::with('likes')->where('uuid', $uuid)->paginate(5);
        return view('guast', compact('data'));
    }
    public function guastCourse($language)
    {
        $data = QuestionAnswer::where('language', $language)->paginate(5);

        return view('guast', compact('data'));
    }
    public function like(Request $request, $uuid)
    {
        $ip = $request->ip();
        $iqa = QuestionAnswer::where('uuid', $uuid)->first();
        if (!$iqa) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
        $like = LikeDislike::where('question_answer_id', $iqa->id)->where('ip', $ip)->where('action', 'like')->first();
        if (!$like) {
            LikeDislike::create(
                [
                    'question_answer_id' => $iqa->id,
                    'action' => 'like',
                    'ip' => $ip,
                ]
            );
            $iqa->increment('like');
            return redirect()->back()->with('success', 'You have  liked');
        }
               $like->delete();
        if ($iqa->like > 0) {
            $iqa->decrement('like');
        }
        return redirect()->back()->with('success', 'You have cancel liked');
    }
    public function dislike(Request $request, $uuid)
    {
        $ip = $request->ip();
        $iqa = QuestionAnswer::where('uuid', $uuid)->first();

        if (!$iqa) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
        $dislike = LikeDislike::where('question_answer_id', $iqa->id)->where('ip', $ip)->where('action', 'dislike')->first();
        if (!$dislike) {
            LikeDislike::create(
                [
                    'question_answer_id' => $iqa->id,
                    'action' => 'dislike',
                    'ip' => $ip,
                ]
            );
            $iqa->increment('dislike');
            return redirect()->back()->with('success', 'You have  disliked');
        }
        $dislike->delete();
        if ($iqa->dislike > 0) {
            $iqa->decrement('dislike');
        }
        return redirect()->back()->with('success', 'You have cancel disliked');
    }
}
