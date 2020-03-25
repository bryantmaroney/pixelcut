<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addContent extends FormRequest
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
            'title'  => ['required','string','max:255'],
            'project'  => ['required'],
            'status'  => ['required'],
//            'word_count'  => ['required'] ,
            'content_type'  => ['required'] ,
//            'tatic'  => ['required'] ,
//            'target_keyword'  => ['required','string'] ,
//            'framing_keyword'  => ['required','string'] ,
//            'publish_date'  => ['required'] ,
//            'voice'  => ['required'] ,
//            'target_date'  => ['required'] ,
//            'publish_page'  => ['required','string','max:255'] ,
//            'writter'  => ['required','string'] ,
//            'notes'  => ['required','string','maxclear:255'] ,
//            'meta_discription'  => ['required','string','max:160'] ,
//            'persona'  => ['required'] ,
//            'pillar'  => ['required'] ,
//            'cluster'  => ['required'] ,
        ];
    }
}
