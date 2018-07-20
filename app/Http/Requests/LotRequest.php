<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LotRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
//        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'currency_id' => 'required|exists:currencies,id',
//            "date_time_open" => 'required|numeric',
//            "date_time_close" => 'required|numeric',
//            'price' => 'required|numeric|min:0',
        ];
    }
}
