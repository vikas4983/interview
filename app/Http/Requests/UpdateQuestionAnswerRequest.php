<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'question' => ['sometimes', 'required', 'string', 'max:255'],
            'answer' =>   ['sometimes', 'required', 'string', 'max:5000'],
            'quote' =>    ['sometimes', 'required', 'string', 'max:255'],
            'code_block' =>  ['sometimes', 'required', 'string', 'max:5000'],
            'heading' =>  ['sometimes', 'required', 'string', 'max:255'],
            'subject' =>  ['sometimes', 'required', 'string', 'max:255'],
            'language' => ['sometimes', 'required', 'string', 'max:255'],
            'status' =>   ['sometimes', 'required', 'integer', 'in:0,1'],
        ];
    }

    public function message(): array
    {
        return (new StoreQuestionAnswerRequest())->message();
    }
}
