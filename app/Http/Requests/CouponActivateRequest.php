<?php

namespace App\Http\Requests;

use App\Rules\CouponActivateRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouponActivateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
                Rule::exists('coupons', 'code')->whereNull('activated_at')->where('campaign_id', $this->get('campaign_id')),
                new CouponActivateRule(),
            ],
        ];
    }
}
