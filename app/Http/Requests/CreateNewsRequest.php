<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsRequest extends FormRequest
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
			'category_id' => ['required', 'integer'],
			'title' => ['required', 'string', 'min:2', 'max:255'],
			'author' => ['required', 'string', 'min:2', 'max:191'],
			'status' => ['required', 'string', 'min:5', 'max:9'],
			'description' => ['sometimes', 'max:255']
        ];
    }

    public function attributes() {
        return [
            'title' => 'Заголовок',
            'author' => 'Автор',
            'description' => 'Текст новости'
        ];
    }
}
