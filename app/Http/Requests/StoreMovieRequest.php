<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'name'        =>['string','required'],
            'hall_id'     =>['string','required','exists:halls,id'],
            'type'        =>['string','required'],
            'image'       =>['image','required'],
            'video'       =>['string','required'],
            'description' =>['string','required'],
            'from'        =>['date','required'],
            'to'          =>['date','required'],
            'showing_type'=>['string','required'],
            'genres'      =>['required','exists:genres,id'],
            'times'       =>['required','exists:times,id'],
        ];
    }
}
