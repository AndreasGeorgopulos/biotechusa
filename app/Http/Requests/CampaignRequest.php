<?php

namespace App\Http\Requests;

use App\Rules\CampaignFinishDateRule;
use App\Rules\CampaignStartDateRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CampaignRequest extends FormRequest
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
            'name' => [
                'required',
                'min:3',
                'max:255',
            ],
            'start_date' => [
                'required',
                'date',
                'date_format:Y-m-d',
                'after_or_equal:today',
                new CampaignStartDateRule($this->get('id')),
            ],
            'finish_date' => [
                'required',
                'date',
                'date_format:Y-m-d',
                'after:start_date',
                new CampaignFinishDateRule($this->get('start_date')),
            ],
            'is_accepted' => [
                'required',
                'numeric',
                Rule::in([0, 1]),
            ],
        ];
    }
}
