<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'glasses'     =>['integer','required'],
            'date'        =>['date','required'],
            'starttime'   =>['string','required'],
            'seats'       =>['string','required','exists:seats,id'],
            'movie_id'    =>['string','required','exists:movies,id'],
            'price_id'    =>['string','required','exists:prices,id'],
        ];
    }
}
