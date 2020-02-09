<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateUser extends FormRequest
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
     * @return array
     */
    public function attributes()
    {
        return [
            'is_admin' => 'role',
            'first_name' => 'first name',
            'last_name' => 'last name',
        ];
    }
        /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'  => ['required','string'] ,
            'last_name'  => ['required','string'] ,
            'is_admin'  => ['required'] ,
            'email'  => ['required','email'] ,
            'status'  => ['required'] ,
        ];
    }
}
