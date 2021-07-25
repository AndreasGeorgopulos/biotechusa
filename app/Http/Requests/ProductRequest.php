<?php

namespace App\Http\Requests;

use App\Models\Campaign;
use App\Rules\ProductPublishedAtRule;
use App\Rules\PublishedAtRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'name' => [
                'required',
                'min:3',
                'max:255',
            ],
            'price' => [
                'required',
                'numeric',
                'min:1',
            ],
            'published_at' => [
                'required',
                'date_format:Y-m-d H:i:s',
                new ProductPublishedAtRule($this->get('campaign_id')),
            ],
        ];
    }
}
