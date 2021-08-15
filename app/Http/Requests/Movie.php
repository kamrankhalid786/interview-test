<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Movie extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:150',
            'description' => 'required|max:1000',
            'release_date' => 'required|date',
            'rating' => 'required|integer|min:1|max:5',
            'price' => 'required|integer',
            'country_name' => 'required|max:150',
            'photo' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Item Name is required",
        ];
    }
}
