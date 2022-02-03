<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    {        return [
        'title' => ['required', 'min:3' ,'unique:posts,title'],   //unique:posts,title': The title has already been taken.
        'description' => ['required', 'min:10'],
    ];
}

 /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
    public function messages()
    {
        return [ // change default error message of Title 
            'title.required' => 'Please, Enter Title , It is requried',
            'title.min' => 'Please, Enter Title at least 3 characters',
            'title.unique' => 'Please enter diffrent title, Title must be unique',
        ];
    }
}
