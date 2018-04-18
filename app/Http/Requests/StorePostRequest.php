<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
            'title' => [
            'min:3',
            'required',
             Rule::unique('posts')->ignore($this->id)],


            'description' => 'min:10|required',
            'user_id' => 'exists:posts'
    
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'this is required form',
            'description.required' => 'description is required'
        ];
    }
}
