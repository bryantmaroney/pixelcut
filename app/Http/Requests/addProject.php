<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addProject extends FormRequest
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
            'p_name' => 'project name',
            'p_manager' => 'project manager',
            'voice' => 'voice note',
            'user_name' => 'user name',

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
            'p_name'  => ['required'] ,
            'website'  => ['required','max:255'] ,
            'p_manager'  => ['required'] ,
            'status'  => ['required'] ,
            'user_name'  => ['required'] ,
            'voice'  => ['required'] ,
            'pillars'  => ['required'] ,
            'clusters'  => ['required'] ,

        ];
    }
}
