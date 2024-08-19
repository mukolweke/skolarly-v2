<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticlePostRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'published_date' => [
                'required',
                'date',
            ],
        ];

        if ($this->isEdit()) {
            $rules['published_date'][] = Rule::afterOrEqual(Carbon::now()->subMonth());
        }

        return $rules;
    }

    /**
     * Determine if the request is for an edit.
     */
    private function isEdit(): bool
    {
        return request()->has('id');
    }

    public function messages(): array
    {
        return [
            'published_date.date' => 'The published date must be a valid date.',
            'published_date.after_or_equal' => 'The published date cannot be more than one month in the past.',
        ];
    }
}
