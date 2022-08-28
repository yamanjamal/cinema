<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'date'        =>['date_format:Y-m-d H:i:s','after_or_equal:today','required'],
            'user_id'     =>['string','required','exists:users,id'],
            'order_items' =>['required'],
            'total_price' =>['required','numeric'],
        ];
    }
}
