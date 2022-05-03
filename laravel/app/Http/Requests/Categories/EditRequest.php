<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
			'title'       => ['required', 'string', 'min:3', 'max:30'],
			'description' => ['nullable', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле :attribute нужно заполнить'
        ];
    }
}