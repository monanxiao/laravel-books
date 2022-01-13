<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannersRequest extends FormRequest
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
                    'title' => 'nullable|string',
                    'link' => 'nullable|url',
                    'uploadImage' => 'required|image'
                ];
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title' => 'nullable|string',
                    'link' => 'nullable|url',
                    'uploadImage' => 'nullable|image'
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
