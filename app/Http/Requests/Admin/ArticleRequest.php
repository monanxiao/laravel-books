<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        switch($this->method())
        {
            // CREATE
            case 'POST':
                return [
                    'title' => 'required|min:3|string',
                    'issue_time' => 'required|date_format:Y-m-d H:i:s',
                    'serial_number' => 'required|numeric',
                    'content' => 'required|min:3|string',
                    'chapter_id' => 'required|exists:chapters,id'
                ];
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title' => 'required|min:3|string',
                    'issue_time' => 'required|date_format:Y-m-d H:i:s',
                    'serial_number' => 'required|numeric',
                    'content' => 'required|min:3|string',
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            };
        }


    }
}
