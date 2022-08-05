<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
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
            'user_name'     => ['string','required'],
            'total_price'   => ['float','required'],
            'user_phone'    => ['string','required'],
            'user_id'       => ['required','exists:users,id'],
            'order_id'      => ['required','exists:orders,id'],
            'account_id'    => ['required','exists:accounts,id'],
        ];
    }
}
