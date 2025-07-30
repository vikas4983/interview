<?php

namespace App\Http\Controllers;

use App\Models\LikeDislike;
use App\Models\QuestionAnswer;
use Illuminate\Http\Request;

class GuastController extends Controller
{
    public function home()
    {
        $iqa = QuestionAnswer::with('likes')->latest('created_at')->paginate(6);
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
        $like = LikeDislike::where('question_answer_id', $iqa->id)->where('ip', $ip)->first();
        if (!$like) {
            LikeDislike::create(
                [
                    'question_answer_id' => $iqa->id,
                    'action' => 'like',
                    'ip' => $ip,
                ]
            );
            if ($iqa) {
                $iqa->update([
                    'like' => intval($iqa->like) + 1,
                ]);
                return redirect()->back()->with('success', 'You have  liked');
            }
        }

        if (!empty($like && $iqa)) {
            $like->destroy($like->id);
            $iqa->update([
                'like' => intval($iqa->like) - 1,
            ]);
            return redirect()->back()->with('success', 'You have cancel liked');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }
    public function dislike(Request $request, $uuid)
    {
        $ip = $request->ip();
        $iqa = QuestionAnswer::where('uuid', $uuid)->first();

        if (!$iqa) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
        $dislike = LikeDislike::where('question_answer_id', $iqa->id)->where('ip', $ip)->first();
        if (!$dislike) {
            LikeDislike::create(
                [
                    'question_answer_id' => $iqa->id,
                    'action' => 'dislike',
                    'ip' => $ip,
                ]
            );
            if ($iqa) {
                $iqa->update([
                    'dislike' => intval($iqa->dislike) + 1,
                ]);
                return redirect()->back()->with('success', 'You have  disliked');
            }
        }

        if (!empty($dislike && $iqa)) {
            $dislike->destroy($dislike->id);
            $iqa->update([
                'dislike' => intval($iqa->dislike) - 1,
            ]);
            return redirect()->back()->with('success', 'You have cancel disliked');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }
}
