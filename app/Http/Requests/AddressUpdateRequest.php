<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class AddressUpdateRequest extends FormRequest
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
            'local_name' => ['string', 'required'],
            'street' => ['string', 'required'],
            'district' => ['string', 'required'],
            'city' => ['string', 'required'],
            'state' => ['string', 'required'],
            'complement' => ['string', 'required'],
            'zip_code' => ['string', 'required'],
            
        ];
    }
}
