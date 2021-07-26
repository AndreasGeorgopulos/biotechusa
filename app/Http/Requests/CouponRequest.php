<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouponRequest extends FormRequest
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
            'campaign_id' => [
                'required',
                'exists:campaigns,id',
            ],
            'code' => [
                'required',
                Rule::unique('coupons', 'code')->ignore($this->get('id')),
            ],
            'discount_value' => [
                'required',
                'numeric',
                'min:1',
            ],
            'discount_type' => [
                'required',
                'numeric',
                Rule::in([1, 2]),
            ],
        ];
    }
}
