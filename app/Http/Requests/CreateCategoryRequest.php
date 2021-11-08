<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
    public function rules() : array
    {
        return [
            'title' => ['required', 'string', 'min:2', 'max:255'],
			'description' => ['sometimes', 'max:255']
        ];
    }

    public function attributes() {
        return [
            'title' => 'Название категории',
        ];
    }
}