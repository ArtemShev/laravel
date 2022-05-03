<?php
declare(strict_types=1);
namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
			'is_admin' => ['required', 'boolean']
		];
    }

    public function messages(): array
	{
		return [
			'required' => 'Поле :attribute нужно заполнить'
		];
	}

	public function attributes()
	{
	//
	}
}
