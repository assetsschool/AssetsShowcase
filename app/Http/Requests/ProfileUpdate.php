<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'biography' => 'sometimes|required',
            'photo' => 'sometimes|required|mimes:jpeg,jpg,png|max:10000',
            'class_of' => 'sometimes|required|numeric|min:4|max:4',
        ];
    }
}
