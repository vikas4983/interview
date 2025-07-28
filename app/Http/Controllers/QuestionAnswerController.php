<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionAnswerRequest;
use App\Http\Requests\UpdateQuestionAnswerRequest;
use App\Models\QuestionAnswer;
use App\Services\languageService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Console\Question\Question;

class QuestionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $languageService;
    public function __construct(languageService $languageService)
    {
        $this->languageService = $languageService;
    }
    public function index()
    {
        $iqa = QuestionAnswer::getAll()->latest('id', 'DESC')->paginate(6);;
        return view('admin.iqa.index', compact('iqa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.iqa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionAnswerRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['uuid'] = Str::uuid();
        QuestionAnswer::create($validatedData);
        return redirect()->back()->with('success', 'Question and answer has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, QuestionAnswer $questionAnswer, $uuid)
    {

        $data = QuestionAnswer::id($uuid)->first();
        return view('admin.iqa.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionAnswer $questionAnswer, $uuid)
    {
        $data = QuestionAnswer::id($uuid)->first();
        return view('admin.iqa.edit', compact('data'));
    }
    public function note($uuid)
    {  
       
        $data = QuestionAnswer::where('language', $uuid)->paginate(5);
        
        return view('admin.iqa.note', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionAnswerRequest $request, $uuid)
    {

        $validatedData = $request->validated();
        $data = QuestionAnswer::id($uuid)->first();
        $data->update($validatedData);
        return redirect()->route('iqa.index')->with('success', 'Question answer has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uuid)
    {
        $data = QuestionAnswer::id($uuid)->first();
        $data->destroy($data->id);
        return redirect()->back()->with('error', 'Question answer has been deleted');
    }
    public function delete($uuid)
    { 
      
        $data = QuestionAnswer::id($uuid)->first();
        $data->destroy($data->id);
       return redirect()->back()->with('error', 'Question answer has been deleted');
    }
}
