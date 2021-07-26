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
            'name' => [
                'required',
                'min:3',
                'max:255',
            ],
            'start_date' => [
                'required',
                'date',
                'date_format:Y-m-d',
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
                Rule::in(['0', '1']),
            ],
        ];
    }
}
