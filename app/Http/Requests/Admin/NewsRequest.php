<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:30',
            'uploadImage' => 'nullable|image',
            'news_categorie_id' => 'required|exists:news_categories,id',
            'type' => ['required', Rule::in(['0', '1', '2', '3'])],
            'author' => 'required|max:30',
            'source' => 'required|max:20',
            'issue_time' => 'required|date_format:Y-m-d H:i:s',
            'description' => 'nullable|max:200',
            'content' => 'required',
        ];
    }
}
