<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionAnswerRequest extends FormRequest
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
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string', 'max:255'],
            'quote' => ['required', 'string', 'max:255'],
            'code_block' => ['required', 'string', 'max:255'],
            'heading' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'language' => ['required', 'string', 'max:255'],
            'status' => ['required', 'integer', 'in:0,1'],
        ];
    }

    public function message(): array
    {
        return [
            'question.required' => 'Question field is required',
            'question.string' => 'Question field must be a string',
            'question.max' => 'Question field is not greater then 255 char of size',

            'answer.required' => 'Answer field is required',
            'answer.string' => 'Answer field must be a string',
            'answer.max' => 'Answer field is not greater then 255 char of size',

            'quote.required' => 'Quote field is required',
            'quote.string' => 'Quote field must be a string',
            'quote.max' => 'Quote field is not greater then 255 char of size',

            'code_block.required' => 'Code block field is required',
            'code_block.string' => 'Code block field must be a string',
            'code_block.max' => 'Code block field is not greater then 255 char of size',

            'heading.required' => 'Heading field is required',
            'heading.string' => 'Heading field must be a string',
            'heading.max' => 'Heading field is not greater then 255 char of size',

            'subject.required' => 'Subject  field is required',
            'subject.string' => 'Subject field must be a string',
            'subject.max' => 'Subject field is not greater then 255 char of size',

            'language.required' => 'Language  field is required',
            'language.string' => 'Language field must be a string',
            'language.max' => 'Language field is not greater then 255 char of size',

            'status.required' => 'Language  field is required',
            'status.integer' => 'Language field must be a integer',
            'status.in' => 'Language field is 1(active) and 0(inActive)',
        ];
    }
}
