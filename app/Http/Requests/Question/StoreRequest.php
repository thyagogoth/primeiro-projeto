<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            //            required|min:10|max:255|ends_with:?
            'question' => [
                'required',
                'min:10',
                //                'ends_with:?',
                function (string $attribute, mixed $value, \Closure $fail) {
                    if (str_ends_with($value, '?') === false) {
                        $fail(__('Are you sure this is a question?'));
                    }
                },
            ],
        ];
    }
}
