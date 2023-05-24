<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UnitCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(Auth::check()){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'required'],
            'manager_id' => ['string', 'required'],
            'street' => ['string', 'required'],
            'district' => ['string', 'required'],
            'city' => ['string', 'required'],
            'state' => ['string', 'required'],
            'zip_code' => ['string', 'required', 'min:8'],
            'phone' => ['string', 'required','min:10', 'max:11', 'unique:units,phone'],
        ];
    }
}
